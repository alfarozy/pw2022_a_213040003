<?php
/*
This core dev by Muhammad Alfarozi

Edit function config & connect only
Don't touch others function if you don't want to get error  
*/

session_start();
class Core
{

    public static function config(String $value)
    {
        $config = [
             'app' => [
                'name' => "Nusantara Hospital Center",
                'url'  => "http://localhost/~koji/pw2022_213040003/tubes",
                'debug' => true // if production set false,
            ],
            'author' => [
                'name'  => "Muhammad Alfarozi",
                'nrp'   => "213040003",
                'website'   => 'https://alfarozy.id',
                'github'    => 'https://github.com/alfarozy'
            ],
            'api' => [
                'google_map' => null
            ]
        ];

        $key = explode('.', $value);
        if (isset($config[$key[0]][$key[1]])) {
            return $config[$key[0]][$key[1]];
        } else {
            if (self::config('app.debug')) {
                return 'config not found';
            } else {
                return null;
            }
        }
    }
    private static function connect()
    {
        $db =  [
            'hostname'  => 'localhost', //database hostname
            'database'  => 'project_nusantarahospital', //database name
            'username'  => 'root',    // database username
            'password'  => 'sandwich', //database password
        ];
        try {
            $conn = mysqli_connect($db['hostname'], $db['username'], $db['password'], $db['database']);
        } catch (\Throwable $th) {
            return $th->getMessage();
            die;
        }
        return $conn;
    }
    public static function query($query)
    {
        try {
            $result = mysqli_query(self::connect(), $query);
            if (mysqli_num_rows($result) === 1) {
                return mysqli_fetch_assoc($result);
            } else {

                $rows = [];
                while ($array = mysqli_fetch_assoc($result)) {
                    $rows[] = $array;
                }
                return $rows;
            }
        } catch (\Throwable $th) {
            if (self::config('app.debug')) {

                self::getMessage($th, $query);
            } else {
                return null;
            }
        }
    }
    public static function queryGet($query)
    {
        try {
            $result = mysqli_query(self::connect(), $query);
           
            $rows = [];
            while ($array = mysqli_fetch_assoc($result)) {
                $rows[] = $array;
            }
            return $rows;
            
        } catch (\Throwable $th) {
            if (self::config('app.debug')) {

                self::getMessage($th, $query);
            } else {
                return null;
            }
        }
    }
    public static function get(String $table, array $where = null, $logic = "AND")
    {
        try {
            if ($where) {

                $where_clause = null;
                $last_key = array_key_last($where);
                foreach ($where as $key => $value) {
                    $real_value = mysqli_escape_string(self::connect(), $value);
                    $where_clause .= '`' . $key . '` = ' . "'" . $real_value . "'";
                    if ($last_key != $key) {
                        $where_clause .= " {$logic} ";
                    }
                }
                $query = "SELECT * FROM {$table} WHERE {$where_clause} ";
            } else {

                $query = "SELECT * FROM {$table}";
            }
            $result = mysqli_query(self::connect(), $query);

            $rows = [];
            while ($array = mysqli_fetch_assoc($result)) {
                $rows[] = $array;
            }
            return $rows;
        } catch (\Throwable $th) {
            if (self::config('app.debug')) {

                self::getMessage($th, $query);
            } else {
                return null;
            }
        }
    }

    public static function join(String $table, String $to, String $select, String $relation)
    {
        try {
            $query = "SELECT {$select} FROM {$table} LEFT JOIN {$to} ON {$relation}";
            $result =  mysqli_query(self::connect(), $query);
            $rows = [];
            while ($array = mysqli_fetch_assoc($result)) {
                $rows[] = $array;
            }
            return $rows;
        } catch (\Throwable $th) {
            if (self::config('app.debug')) {

                self::getMessage($th, $query);
            } else {
                return null;
            }
        }
    }

    public static function show(String $table, array $where, string $logic = "AND")
    {
        try {
            $where_clause = null;
            $last_key = array_key_last($where);
            foreach ($where as $key => $value) {
                $real_value = mysqli_escape_string(self::connect(), $value);
                $where_clause .= '`' . $key . '` = ' . "'" . $real_value . "'";
                if ($last_key != $key) {
                    $where_clause .= " {$logic} ";
                }
            }

            //> select data yang dinput terbaru 
            $query = "SELECT * FROM {$table} WHERE {$where_clause} ORDER BY `id` DESC LIMIT 1";
            $result = mysqli_query(self::connect(), $query);
            $result = mysqli_fetch_assoc($result);
            return $result;
        } catch (\Throwable $th) {
            if (self::config('app.debug')) {
                self::getMessage($th, $query);
            } else {
                return false;
            }
        }
    }

    public static function insert(String $table, array $data)
    {
        try {
            $fields = null;
            $values = null;
            $last_key = array_key_last($data);
            foreach ($data as $key => $value) {
                $fields .= '`' . $key . '`';
                $values .= "'" . $value . "'";
                if ($last_key != $key) {
                    $fields .= ",";
                    $values .= ",";
                }
            }
            //> input to database
            $query = "INSERT INTO {$table} ({$fields}) VALUES ({$values})";
            mysqli_query(self::connect(), $query);

            $where_clause = null;
            $last_key = array_key_last($data);
            foreach ($data as $key => $value) {
                $where_clause .= '`' . $key . '` = ' . "'" . $value . "'";
                if ($last_key != $key) {
                    $where_clause .= " OR ";
                }
            }

            //> select data yang dinput terbaru 
            $query = "SELECT * FROM {$table} WHERE {$where_clause} ORDER BY `id` DESC LIMIT 1";
            $result = mysqli_query(self::connect(), $query);
            $result = mysqli_fetch_assoc($result);
            return $result;
        
        
        } catch (\Throwable $th) {
            if (self::config('app.debug')) {

                self::getMessage($th, $query);
            } else {
                return false;
            }
        }
    }
    public static function insertTo(String $table, array $data)
    {
        try {
            $fields = null;
            $values = null;
            $last_key = array_key_last($data);
            foreach ($data as $key => $value) {
                $real_key = mysqli_escape_string(self::connect(), $key);
                $real_value = mysqli_escape_string(self::connect(), $value);

                $fields .= '`' . $real_key . '`';
                $values .= "'" . $real_value . "'";
                if ($last_key != $key) {
                    $fields .= ",";
                    $values .= ",";
                }
            }
            $query = "INSERT INTO {$table} ({$fields}) VALUES ({$values})";

            return mysqli_query(self::connect(), $query);
        } catch (\Throwable $th) {
            if (self::config('app.debug')) {

                self::getMessage($th, $query);
            } else {
                return false;
            }
        }
    }

    public static function delete(String $table, array $where)
    {
        try {
            $where_clause = null;
            $last_key = array_key_last($where);
            foreach ($where as $key => $value) {
                $real_value = mysqli_escape_string(self::connect(), $value);
                $where_clause .= $key . "='" . $real_value . "'";
                if ($last_key != $key) {
                    $where_clause .= " AND ";
                }
            }
            //> cek data in database
            $queryCekData = "SELECT count('*') as `count` FROM {$table} WHERE {$where_clause}";
            $result = mysqli_query(self::connect(), $queryCekData);
            $result = mysqli_fetch_assoc($result);
            if ($result['count'] == 0) {
                if (self::config('app.debug')) {
                    echo "Data not found, please cek your database";
                    exit();
                } else {
                    return false;
                }
            }

            $query = "DELETE FROM {$table} WHERE {$where_clause}";
            //not yet
            $delete = mysqli_query(self::connect(), $query);
            return true; // return succes 
        } catch (\Throwable $th) {
            if (self::config('app.debug')) {
                self::getMessage($th, $query);
            } else {
                return false;
            }
        }
    }

    public static function update(String $table, array $data, array $where)
    {
        try {
            $where_clause = null;
            $last_key = array_key_last($where);
            foreach ($where as $key => $value) {
                $real_value = mysqli_escape_string(self::connect(), $value);
                $real_key = mysqli_escape_string(self::connect(), $key);

                $where_clause .= $real_key . "='" . $real_value . "'";
                if ($last_key != $key) {
                    $where_clause .= " AND ";
                }
            }
            $setUPdate = null;
            $last_key = array_key_last($data);
            foreach ($data as $key => $value) {
                $setUPdate .= '`' . $key . '` = ' . "'" . $value . "'";
                if ($last_key != $key) {
                    $setUPdate .= ",";
                }
            }
            $query = "UPDATE {$table} SET {$setUPdate} WHERE {$where_clause}";
            return mysqli_query(self::connect(), $query);
        } catch (\Throwable $th) {
            if (self::config('app.debug')) {
                self::getMessage($th, $query);
            } else {
                return false;
            }
        }
    }

    /**
     * Upload image to server with validation 
     *
     */
    public static function uploadImage(array $file, String $folder)
    {

        $format_file = ['png', 'jpg', 'jpeg'];
        $format_file_input = explode('.', $file['name']);
        $format_file_input = strtolower(end($format_file_input));

        if (!in_array($format_file_input, $format_file)) {
            $response = [
                'status' => 'error',
                'message' => 'Yang anda pilih bukan gambar'
            ];
            return $response;
        }

        if ($file['type'] != 'image/jpeg' && $file['type'] != 'image/png') {
            $response = [
                'status' => 'error',
                'message' => 'Pilih file gambar dengan benar'
            ];
            return $response;
        }
        if ($file['size'] > 5000024) {
            $response = [
                'status' => 'error',
                'message' => 'Ukuran gambar terlalu besar'
            ];
            return $response;
        }

        // $pathFile =  $path . "/" . uniqid() . '.' . $format_file_input;
        $imgUrl = "img/" . $folder . "/" . uniqid() . '.' . $format_file_input;
        $pathFile =  self::root_path() . "/assets" . "/" . $imgUrl;
        move_uploaded_file($file['tmp_name'], $pathFile);

        $response = [
            'status' => 'success',
            'message' => $imgUrl
        ];
        return $response;
    }

    public static function slug($title)
    {
        return strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $title)));
    }
    public static function check($password, $hash)
    {
        return password_verify($password, $hash);
    }
    private static function getMessage($error, $query)
    {
        echo "<h3 style='color:red'>Terjadi Kesalahan <span style='color: #000;'> {$error->getMessage()}</span></h3>";
        echo "Coba periksa file \"{$error->getFile()}\" Pada baris: <b>{$error->getLine()}</b>";
        echo "<br> <b>In {$query}</b>";
        die;
    }

    public static function root_path()
    {
        return dirname(__FILE__, 2);
    }

    /**
     * Membuat link untuk mengakses file di folder assets
     *
     * @param string $file
     * @return string $url
     */

    public static function assets($file)
    {
        return self::config('app.url') . '/assets' . '/' . $file;
    }
    public static function request($value = null)
    {
        if ($value) {
            $data = mysqli_escape_string(self::connect(), $value);
        } else {
            $data = null;
        }

        return $data;
    }

    public static function limit($value, $limit = 100, $end = '...')
    {
        if (mb_strwidth($value, 'UTF-8') <= $limit) {
            return $value;
        }

        return rtrim(mb_strimwidth($value, 0, $limit, '', 'UTF-8')) . $end;
    }
}

function active_page($page, $active)
{
    if (isset($page) && isset($active)) {

        return ($page == $active) ? 'active' : '';
    } else {
        return false;
    }
}
function config($value)
{
    return Core::config($value);
}
function base_url($page = null)
{
    return Core::config('app.url') . "/" . $page;
}
function assets($file)
{
    return Core::assets($file);
}

function dd($data)
{
    var_dump($data);
    die;
}

function currency_IDR($value)
{
    return "Rp " . number_format($value, 0, ',', '.');
}

function IDRToNum($value)
{
    return preg_replace('/\D/', '', $value);
}

function bcrypt($password)
{
    return password_hash($password, PASSWORD_BCRYPT);
}

function redirect($url)
{
    header("location:" . $url);
    exit();
}
function flash($status = '', $msg = '')
{
    if (isset($_SESSION[$status])) {
        $msg = $_SESSION[$status];
        unset($_SESSION[$status]);
        return $msg;
    } else {
        $_SESSION[$status] = $msg;
    }
}
function session($key = null, $value = null)
{
    if (!empty($key) && !empty($value)) {
        $_SESSION[$key] = $value;
    } elseif (!empty($key) && empty($value)) {

        if (isset($_SESSION[$key])) {

            return $_SESSION[$key];
        } else {
            return false;
        }
    } else {
        return $_SESSION;
    }
}
function format_date($format, $date)
{
    $date = strtotime($date);
    return date($format, $date);
}
function created_at()
{
    return date('Y-m-d h:i:s');
}

function auth($var = null)
{

    if (session('role')) {
        $email = session('email');
        if (session('role') == 'admin') {
            $data = Core::query("SELECT * FROM `admin` WHERE `email`='$email' LIMIT 1");
        } else if (session('role') == 'doctor') {
            $data = Core::query("SELECT * FROM `doctors` WHERE `email`='$email' LIMIT 1");
        } else {
            $data = Core::query("SELECT * FROM `users` WHERE `email`='$email' LIMIT 1");
        }

        return $data[$var];
    } else {
        return null;
    }
}
