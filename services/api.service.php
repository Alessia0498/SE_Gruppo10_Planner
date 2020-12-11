<?php


/**
 * Api service to help manage http requests to the database
 */
class Api
{
  static private $base_url = "http://arma-se.ddns.net";

  static private function call_api($method, $url, $data = false)
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
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    $result = curl_exec($curl);
    curl_close($curl);
    return $result;
  }

  static private function request($method, $url, $data = false)
  {
    return self::call_api($method, self::$base_url . $url, $data);
  }

  static private function get($url, $data = false)
  {
    return self::request("GET", $url, $data);
  }

  static private function post($url, $data = false)
  {
    return self::request("POST", $url, $data);
  }

  static private function put($url, $data = false)
  {
    return self::request("PUT", $url, $data);
  }

  static private function delete($url, $data = false)
  {
    return self::request("DELETE", $url, $data);
  }


  /**
   * Retrieves the list of maintenance's activities from the database
   *
   * @return string|bool
   * The result on success, false on failure.
   */
  static public function list_maintenance_activity()
  {
    return self::get("/maintenances");
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
    return self::get("/maintenance" . "/" . $id);
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

    return self::post("/maintenance", $maintenance);
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
    return self::put("/maintenance" . "/" . $id, $maintenance);
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
    return self::delete("/maintenance" . "/" . $id);
  }
}
