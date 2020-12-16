
<?php

/**
 * Api service to help manage http requests to the database
 */
class Api
{
  static private $base_url = "http://arma-se.ddns.net";

  static private $temporary_token = "";

  static private function get_token()
  {
    if (API::$temporary_token) {
      //echo ("temporary_token");
      return API::$temporary_token;
    }
    if (isset($_SESSION['token']) && $_SESSION['token']) {
      // echo ("session[token]");
      return $_SESSION['token'];
    }
    return;
    throw new Exception("Missing Access token");
  }

  static private function call_api($method, $url, $data = false, $authorization = true)
  {
    $curl = curl_init();
    switch ($method) {
      case "POST":
        curl_setopt($curl, CURLOPT_POST, 1);
        if ($data)
          curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
        break;
      case "PUT":
        curl_setopt($curl, CURLOPT_PUT, 1);
        if ($data)
          $url = sprintf("%s?%s", $url, http_build_query($data));
        break;
      default:
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, $method);
        if ($data)
          $url = sprintf("%s?%s", $url, http_build_query($data));
    }
    // Optional Authentication:
    // curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
    // curl_setopt($curl, CURLOPT_USERPWD, "username:password");
    if ($authorization) {
      try {
        curl_setopt($curl, CURLOPT_HTTPHEADER, array(
          "Authorization: Bearer " . API::get_token()
        ));
      } catch (Exception $var) {
        go_to_page("login.php");
      }
    }
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    $result = curl_exec($curl);
    $status_code = curl_getinfo($curl, CURLINFO_HTTP_CODE);
    curl_close($curl);
    return [
      'status_code' => $status_code,
      'data' => $result
    ];
  }

  static private function request($method, $url, $data = false, $authorization = true)
  {
    // var_dump($method, $url, $data, $authorization);
    // echo ("Authorization: Bearer " . API::get_token());
    $response = self::call_api($method, self::$base_url . $url, $data, $authorization);
    if ($response["status_code"] == 401) {
      go_to_page("./SE_Gruppo10_Admin/login.php");
    }
    return $response["data"];
  }

  static private function get($url, $data = false, $authorization = true)
  {
    return self::request("GET", $url, $data, $authorization);
  }

  static private function post($url, $data = false, $authorization = true)
  {
    return self::request("POST", $url, $data, $authorization);
  }

  static private function put($url, $data = false, $authorization = true)
  {
    return self::request("PUT", $url, $data, $authorization);
  }

  static private function delete($url, $data = false, $authorization = true)
  {

    return self::request("DELETE", $url, $data, $authorization);
  }


  /**
   * Retrieves the list of maintenance's activities from the database
   *
   * @return string|bool
   * The result on success, false on failure.
   */
  static public function list_maintenance_activity()
  {
    return self::get("/activities");
  }


  /**
   * Retrieves the list of maintenance activities from the database by size
   *
   * @param string $current
   * The current page
   * 
   * @param string $page_size
   * The page size
   * 
   * @param string $week
   * The week of the maintainance activity
   * 
   * @return string|bool
   * The result on success, false on failure.
   */
  static public function list_activities_by_size($week, $current, $page_size)
  {
    return self::get("/activities" . "?week=" . $week . "&current_page=" . $current . "&page_size=" . $page_size);
  }



  /**
   * Retrieves the maintenance activity with given id from the database
   *
   * @param string $id
   * The Maintenance's activity
   * 
   * @return string|bool
   * The result on success, false on failure.
   */
  static public function get_maintenance_activity($id)
  {
    return self::get("/activity" . "/" . $id);
  }

  /**
   * Creates a new maintenance activity in the database based on given activity data
   *
   * @param array[string]string $maintenance
   * The activity's data
   * 
   * @return string|bool
   * The result on success, false on failure.
   */
  static public function post_maintenance_activity($maintenance)
  {

    return self::post("/activity", $maintenance);
  }


  /**
   * Edits a maintenance activity with given id in the database based on given maintenance activity  data
   *
   * @param string $id
   * The maintenance activity's id
   * @param array[string]string $maintenance
   * The  maintenance activity's data
   * 
   * @return string|bool
   * The result on success, false on failure.
   */
  static public function put_maintenance_activity($id, $maintenance)
  {
    return self::put("/activity" . "/" . $id, $maintenance);
  }

  /**
   * Deletes a maintenance activity with given id from the database
   *
   * @param string $id
   * The activity's id
   * 
   * @return string|bool
   * The result on success, false on failure.
   */
  static public function delete_maintenance_activity($id)
  {
    /*if (API::$temporary_token) {
      var_dump(API::$temporary_token);
    }
    if (isset($_SESSION['token'])) {
      var_dump($_SESSION['token']);
    }*/
    return self::delete("/activity" . "/" . $id);
  }


  /**
   * Forward maintenance activity by week
   *
   * @param string $id
   * The activity's id
   * 
   * @return string|bool
   * The result on success, false on failure.
   */
  static public function forward_maintenance_activity($id)
  {
    return self::get("/maintainer" . "/" . $id . "/availabilities");
  }

  /**
   * Retrieves the list of availabilities from the database by size
   *
   * @param string $current
   * The current page
   * 
   * @param string $page_size
   * The page size
   * 
   * @param string $week
   * The week of the maintainance activity
   * 
   * @return string|bool
   * The result on success, false on failure.
   */
  static public function list_availabilities_by_size($week, $current, $page_size)
  {
    return self::get("/maintainer"  . $week . "/availabilities" . "?current_page=" . $current . "&page_size=" . $page_size);
  }

  /**
   * Availability of  maintainer chosen 
   *
   *
   * 
   * @return string|bool
   * The result on success, false on failure.
   */
  static public function availability($username, $week)
  {
    return self::get("/maintainer" . "/" . $username . "/availability", $week);
  }


  /**
   * Assign of activity chosen 
   *
   *
   * 
   * @return string|bool
   * The result on success, false on failure.
   */
  static public function assign($id, $username)
  {
    return self::get("/activity" . "/" . $id . "/assign?username=" . $username);
  }

  /**
   * 
   * Checks that the inserted user is in the database
   * 
   * 
   * @return string|bool
   * The result on success, false on failure.
   */
  static public function login($user)
  {
    $login_response = self::post("/login", $user, false);
    $login_data = json_decode($login_response, true);
    if (isset($login_data["access_token"])) {
      Api::$temporary_token = $login_data["access_token"];
      $_SESSION["token"] = $login_data["access_token"];
    }
    return $login_response;
  }


  /**
   * 
   * Logout user
   * 
   * 
   * @return string|bool
   * The result on success, false on failure.
   */
  static public function logout()
  {
    Api::$temporary_token = "";
    if (isset($_SESSION["token"])) {
      unset($_SESSION["token"]);
    }
    return self::post("/logout");
  }
}
