const qs = require('querystring');
const axios = require('axios');
var password = "fdciabdul123";
const fs = require("fs");
var user = "fakyuanjing";
var n = 10; 
for(var i=1; i<=n; i++){
  var username = user + n++;
   const requestBody = {
         is_crypto: "false",
         not_login: "0",
         username: username,
         password: password
          }
var url = "https://webapi-os.account.mihoyo.com/Api/regist_by_account";
axios.post(url ,qs.stringify(requestBody))
  .then((result) => {
var i = result.data;
if (i.data.status == -204){
        console.log(" = > Akun Gagal Dibuat " + n++)
     }else{
         console.log(" = >  Akun Berhasil Dibuat \n    Username :"+ username +"| Password:"+ password +"]");
   fs.writeFile('akun.txt', username +":"+ password +"\n",  {'flag':'a'},  function(err) {
         if (err) {
       console.error("gagal"+ err);

}
    })
}
}
)        
  .catch((err) => {
console.log(err +"something went wrong");
  })
}
