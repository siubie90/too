<?php
date_default_timezone_set('Asia/Jakarta');
include "function.php";
echo color("green","# # # # # # # # # # # # # # # # # # # # # # # \n");
echo color("yellow","[•] Time : ".date('[d-m-Y] [H:i:s]')." \n");
echo color("yellow","[•] SABAR COK..... \n");
echo color("yellow","[•] nulis togel 62xxxxxxxxxx \n");
echo color("green","# # # # # # # # # # # # # # # # # # # # # # # \n");
function change(){
$nama = nama();
$email = str_replace(" ", "", $nama) . mt_rand(100, 999);
ulang:
echo color("nevy","(•) Nomor : ");
$no = trim(fgets(STDIN));
$data = '{"email":"'.$email.'@gmail.com","name":"'.$nama.'","phone":"+'.$no.'","signed_up_country":"ID"}';
$register = request("/v5/customers", null, $data);
if(strpos($register, '"otp_token"')){
$otptoken = getStr('"otp_token":"','"',$register);
echo color("green","+] Kode verifikasi sudah di kirim")."\n";
otp:
echo color("nevy","?] Otp: ");
$otp = trim(fgets(STDIN));
$data1 = '{"client_name":"gojek:cons:android","data":{"otp":"' . $otp . '","otp_token":"' . $otptoken . '"},"client_secret":"83415d06-ec4e-11e6-a41b-6c40088ab51e"}';
$verif = request("/v5/customers/phone/verify", null, $data1);
if(strpos($verif, '"access_token"')){
echo color("green","+] Berhasil mendaftar");
$token = getStr('"access_token":"','"',$verif);
$uuid = getStr('"resource_owner_id":',',',$verif);
echo "\n".color("yellow","+] Your access token : ".$token."\n\n");
save("token.txt",$token);
echo "\n".color("nevy","?] Mau Redeem Voucher?: y/n ");
$pilihan = trim(fgets(STDIN));
if($pilihan == "y" || $pilihan == "Y"){
echo color("red","===========(REDEEM TOGELE)===========");
reff:
$data = '{"referral_code":"G-N42CQ7B"}';
$claim = request("/customer_referrals/v1/campaign/enrolment", $token, $data);
$message = fetch_value($claim,'"message":"','"');
if(strpos($claim, 'Promo kamu sudah bisa dipakai')){
echo "\n".color("green","+] Message: ".$message);
echo "\n".color("red","-] Message: ".$message);
$code1 = request('/go-promotions/v1/promotions/enrolment", $token, $data);{"promo_code":"COBAGOFOOD2206"}'); 
$message = fetch_value($claim1,'"message":"','"');
if(strpos($claim, 'Promo kamu sudah bisa dipakai.')){
echo "\n".color("green","Message: ".$message);
goto gofood;
 }else{
echo "\n".color("white"," Message: ".$message);
gofood:
echo "\n".color("white"," nyohh duitmu..");
echo "\n".color("white"," NGOPI CUK");
for($a=1;$a<=3;$a++){
echo color("white","."); 

$code1 = request('/go-promotions/v1/promotions/enrolment", $token, $data);{"promo_code":"GOFOODLAGI090320A"}');
$message = fetch_value($claim1,'"message":"','"');
echo "\n".color("white"," Message: ".$message);
echo "\n".color("white"," Voucere cukk.");
echo "\n".color("white"," Sabar cuk");
for($a=1;$a<=3;$a++){
echo color("white",".");
}
$boba09 = request('/go-promotions/v1/promotions/enrolment", $token, $data);{"promo_code":"STAYGOFOOD201105SC"}');
$messageboba09 = fetch_value($boba09,'"message":"','"');
echo "\n".color("white"," Message: ".$messageboba09);
}
gofood:
$cekvoucher = request('/gopoints/v3/wallet/vouchers?limit=10&page=1', $token);
$total = fetch_value($cekvoucher,'"total_vouchers":',',');
$voucher3 = getStr1('"title":"','",',$cekvoucher,"3");
$voucher1 = getStr1('"title":"','",',$cekvoucher,"1");
$voucher2 = getStr1('"title":"','",',$cekvoucher,"2");
$voucher4 = getStr1('"title":"','",',$cekvoucher,"4");
$voucher5 = getStr1('"title":"','",',$cekvoucher,"5");
$voucher6 = getStr1('"title":"','",',$cekvoucher,"6");
echo "\n".color("green","1. ".$voucher1);
echo "\n".color("green"," 2. ".$voucher2);
echo "\n".color("green"," 3. ".$voucher3);
echo "\n".color("green"," 4. ".$voucher4);
echo "\n".color("green"," 5. ".$voucher5);
echo "\n".color("green"," 6. ".$voucher6);
$expired1 = getStr1('"expiry_date":"','"',$cekvoucher,'1');
$expired2 = getStr1('"expiry_date":"','"',$cekvoucher,'2');
$expired3 = getStr1('"expiry_date":"','"',$cekvoucher,'3');
$expired4 = getStr1('"expiry_date":"','"',$cekvoucher,'4');
$expired5 = getStr1('"expiry_date":"','"',$cekvoucher,'5');
$expired6 = getStr1('"expiry_date":"','"',$cekvoucher,'6');
setpin:
echo "\n".color("nevy","?] Mau set pin?: y/n ");
$pilih1 = trim(fgets(STDIN));
if($pilih1 == "y" || $pilih1 == "Y"){
//if($pilih1 == "y" && strpos($no, "628")){
echo color("red","========( PIN ANDA = 112233)========")."\n";
$data2 = '{"pin":"112233"}';
$getotpsetpin = request("/wallet/pin", $token, $data2, null, null, $uuid);
echo "Otp set pin: ";
$otpsetpin = trim(fgets(STDIN));
$verifotpsetpin = request("/wallet/pin", $token, $data2, null, $otpsetpin, $uuid);
echo $verifotpsetpin;
}else if($pilih1 == "n" || $pilih1 == "N"){
die();
}else{
echo color("red","-] GAGAL COK!!!\n");
}
goto setpin;
}
}else{
echo color("red","-] Otp yang anda input salah");
echo"\n==================================\n\n";
echo color("yellow","!] Silahkan input kembali\n");
goto otp;
}
}else{
echo color("red","NOMOR SAlAH COK !!!");
echo "\nMau ulang? (y/n): ";
$pilih = trim(fgets(STDIN));
if($pilih == "y" || $pilih == "Y"){
echo "\n==============Register==============\n";
goto ulang;
}else{
echo "\n==============Register==============\n";
goto ulang;
}
}
}
echo change()."\n"; ?>
