<?php 
// namespace App\Helpers;
use Config\Services;

if (!function_exists('post')) {

    function post($key = null)
    {
        $request = service('request');
        return $key !== null ? $request->getPost($key) : $request->getPost();
    }
}

if (!function_exists('generateWallet')) {

    function generateWallet()
    {
        $random_1 = strtolower(substr(hash('sha256', random_string('alnum', 64)), 0, 8));
        $random_2 = strtolower(substr(hash('sha256', random_string('alnum', 64)), 0, 4));
        $random_3 = strtolower(substr(hash('sha256', random_string('alnum', 64)), 0, 4));
        $random_4 = strtolower(substr(hash('sha256', random_string('alnum', 64)), 0, 4));
        $random_5 = strtolower(substr(hash('sha256', random_string('alnum', 64)), 0, 12));

        return $random_1 . '-' . $random_2 . '-' . $random_3 . '-' . $random_4 . '-' . $random_5;
    }
}

if (!function_exists('userid')) {
    function userid()
    {
        return session()->get('user_id');
    }
}

if (!function_exists('sekarang')) {
      /**
     * Fungsi untuk mendapatkan tanggal saat ini.
     *
     * @return string
     */
    function sekarang()
    {
        return date('Y-m-d H:i:s');
    }
}

if (!function_exists('userdata')) {
    function userdata($where_data = null)
    {
        $db = db_connect();
        $builder = $db->table('tb_users');

        if ($where_data !== null) {
            $builder->where($where_data);
        } else {
            $builder->where('id', userid());
        }

        $query = $builder->get();

        if ($query->getNumRows() == 1) {
            return $query->getRow();
        } elseif ($query->getNumRows() > 1) {
            return $query->getResult();
        } else {
            return false;
        }
    }
}

if (!function_exists('howdy')) {
    function howdy($string = 'Guest')
    {
        $get_hour = date('H');
        if ($get_hour >= 0 && $get_hour < 10) {
            $output_string = 'Morning';
        } elseif ($get_hour >= 10 && $get_hour < 21) {
            $output_string = 'Afternoon';
        } elseif ($get_hour >= 21) {
            $output_string = 'Evening';
        }

        return ucwords('Good ' . $output_string . ', ' . $string);
    }
}

if (!function_exists('user_picture')) {
    function user_picture($image = 'no-images.jpg')
    {
        return base_url('uploads/users/' . $image);
    }
}

if (!function_exists('currency')) {
    function currency($string, $count = 0, $currency = null)
    {
        $currency = $currency ?? COIN_EXT; // Define COIN_EXT or use null

        return floatval($string) . ' ' . $currency;
    }
}

if (!function_exists('option')) {
    function option($param = null)
    {
        $db = db_connect();
        $builder = $db->table('tb_options');
        $builder->select('*')->where('option_name', $param);
        $query = $builder->get();
        return ($query->getNumRows() == 1) ? $query->getRowArray() : null;
    }
}

if (!function_exists('script_tag')) {
    function script_tag($src = '', $type = 'text/javascript', $index_page = false)
    {
        $src = (is_array($src)) ? $src : [$src];
        $link = '';
        foreach ($src as $item) {
            $link .= '<script src="' . esc($item, 'attr') . '" type="' . esc($type, 'attr') . '"></script>' . "\n";
        }
        return $link;
    }
}

if (!function_exists('time_span')) {
    function time_span($post_date = null, $distance = 2)
    {
        $post_date = (is_numeric($post_date)) ? date('Y-m-d H:i:s', $post_date) : $post_date;
        $date1 = new DateTime($post_date);
        $date2 = new DateTime(date('Y-m-d H:i:s'));
        $interval = $date1->diff($date2);

        if ($interval->days >= 5) {
            $show_date = date('d F Y H:i', strtotime($post_date));
        } else {
            $show_date = timespan(strtotime($post_date), time(), $distance) . ' ago';
        }

        return $show_date;
    }
}

if (!function_exists('random_avatar')) {
    function random_avatar()
    {
        $curl = file_get_contents('https://randomuser.me/api/');
        $result = json_decode($curl);
        return $result->results[0]->picture->large;
    }
}

if (!function_exists('indo_phone_format')) {
    function indo_phone_format($string = '')
    {
        $output = preg_replace('/(0|\+?\d{2})(\d{7,8})/', '$2', $string);
        $split_detect = explode('620', $string);
        if (isset($split_detect[1])) {
            $output = str_replace('620', '', $string);
        }
        return '62' . $output;
    }
}
if (!function_exists('form_open')) {
    /**
     * Generate the opening form tag with optional CSRF token.
     *
     * @param string $action The URL the form will submit to
     * @param array $attributes Array of attributes for the form tag
     * @param array $hidden Array of hidden fields
     * @return string
     */
    function form_open(string $action = '', array $attributes = [], array $hidden = []): string
    {
        // Start building the form tag
        $form = '<form action="' . esc($action) . '"';

        // Add attributes to the form tag
        foreach ($attributes as $key => $value) {
            $form .= ' ' . esc($key) . '="' . esc($value) . '"';
        }

        // Set the method to POST by default
        if (!isset($attributes['method'])) {
            $form .= ' method="post"';
        }

        $form .= '>';

        // Add CSRF field if CSRF protection is enabled
        $csrfTokenName = 'csrf_app';
        $csrfTokenValue = csrf_hash();
        $form .= '<input type="hidden" name="' . esc($csrfTokenName) . '" value="' . esc($csrfTokenValue) . '">';

        // Add hidden fields
        foreach ($hidden as $name => $value) {
            $form .= '<input type="hidden" name="' . esc($name) . '" value="' . esc($value) . '">';
        }

        return $form;
    }
}
if (!function_exists('form_open_multipart')) {
    /**
     * Generate the opening form tag with multipart support.
     *
     * @param string $action The URL the form will submit to
     * @param array $attributes Array of attributes for the form tag
     * @param array $hidden Array of hidden fields
     * @return string
     */
    function form_open_multipart(string $action = '', array $attributes = [], array $hidden = []): string
    {
        // Start building the form tag
        $form = '<form action="' . esc($action) . '"';

        // Add attributes to the form tag
        foreach ($attributes as $key => $value) {
            $form .= ' ' . esc($key) . '="' . esc($value) . '"';
        }

        // Set the method to POST by default
        if (!isset($attributes['method'])) {
            $form .= ' method="post"';
        }

        // Add multipart/form-data for file uploads
        $form .= ' enctype="multipart/form-data">';

        // Add CSRF field
        $csrfTokenName = 'csrf_app';
        $csrfTokenValue = csrf_hash();
        $form .= '<input type="hidden" name="' . esc($csrfTokenName) . '" value="' . esc($csrfTokenValue) . '">';

        // Add hidden fields
        foreach ($hidden as $name => $value) {
            $form .= '<input type="hidden" name="' . esc($name) . '" value="' . esc($value) . '">';
        }

        return $form;
    }
}

if (!function_exists('form_hidden')) {
    /**
     * Generate a hidden form field.
     *
     * @param string $name The name of the hidden field
     * @param string $value The value of the hidden field
     * @return string
     */
    function form_hidden(string $name, string $value): string
    {
        return '<input type="hidden" name="' . esc($name) . '" value="' . esc($value) . '">';
    }
}

if (!function_exists('form_close')) {
    /**
     * Generate the closing form tag.
     *
     * @return string
     */
    function form_close(): string
    {
        return '</form>';
    }
if (!function_exists('db')) {
    /**
     * Generate the closing form tag.
     *
     * @return object
     */
    function db(): object
    {
        return \Config\Database::connect();
    }

} 
if (!function_exists('ucapan')) {
    /**
     * Generate the closing form tag.
     *
     * @return string
     */
    function ucapan() {
        $hour = date('H');
        // Tentukan ucapan berdasarkan waktu
        if ($hour >= 5 && $hour < 12) {
            return "Selamat Pagi";
        } elseif ($hour >= 12 && $hour < 15) {
            return "Selamat Siang";
        } elseif ($hour >= 15 && $hour < 18) {
            return "Selamat Sore";
        } else {
            return "Selamat Malam";
        }
    }
    

} 
}
