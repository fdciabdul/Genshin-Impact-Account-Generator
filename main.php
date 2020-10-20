<?php
//nannochan0 (test account) {"code":200,"data":{"account_info":{"account_id":80454184,"account_name":"n****n0","country":"ID","safe_level":1,"weblogin_token":"tPXw9izFFwMZ1vfm94s8PuxAgDzUemlfKMGIqzIW"},"msg":"Success","status":1}}
$file = 'akun_genshin.txt';
$user_genshin = "genshincrot";
$pass_genshin = "genshincrot";
for ($i = 1; $i <= 2; $i++) {
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL,"https://webapi-os.account.mihoyo.com/Api/regist_by_account");
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_POSTFIELDS, "is_crypto=false&not_login=0&username=".$user_genshin."".$i."&password=".$pass_genshin."".$i);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$server_output = curl_exec($ch);
curl_close ($ch);
//print_r($server_output);
$json = json_decode($server_output, true);

if ($json['data']['status'] == -404) {
	 echo $json['data']['info']."<br />";
}elseif ($json['data']['status'] == -204) {
	echo $user_genshin."".$i." - ENGLISH: ".$json['data']['info']." / INDONESIA: Pengguna Tidak bisa didaftarkan, mungkin sudah ada!<br />";
}elseif ($json['code'] == 200) {
    $current = file_get_contents($file);
    $current .= "--------------------------------------------------------------------------\n";
    $current .= "--------------------GENSHIN IMPACT ACCOUNT GENERATOR v1.0-----------------\n";
    $current .= "------------------".date('l jS \of F Y h:i:s A')."----------------\n";
    $current .= "--------------------------------------------------------------------------\n";
    $current .= "Account ID: ".$json['data']['account_info']['account_id']."\n";
    $current .= "Account Name: ".$json['data']['account_info']['account_name']."\n";
    $current .= "Account Username: ".$user_genshin."".$i."\n";
    $current .= "Account Password: ".$pass_genshin."".$i."\n";
    $current .= "Account Country: ".$json['data']['account_info']['country']."\n";
    $current .= "Account Safe Level: ".$json['data']['account_info']['safe_level']."\n";
    $current .= "Account Weblogin Token: ".$json['data']['account_info']['weblogin_token']."\n";
    $current .= "Message: ".$json['data']['msg']."\n";
    $current .= "Status: ".$json['data']['status']."\n";
    $current .= "--------------------------------------------------------------------------\n";
    $current .= "---------------------Author Blog NightKidz - Azwar Anas-------------------\n";
    $current .= "--------------------------------------------------------------------------\n\r\n";
    file_put_contents($file, $current);
}
}
?>
