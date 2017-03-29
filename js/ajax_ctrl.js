function dump(obj) {
	//it's only use at debugging.
    var out = '';
    for (var i in obj) {
        out += i + ": " + obj[i] + "\n";
    }

    console.log(out);
    // var pre = document.createElement('pre');
    // pre.innerHTML = out;
    // document.body.appendChild(pre)
}
var login_er = function(){
	$("#message").html("<p styple='color:green; font-weight:bold'>아이디 또는 비밀번호가 틀렸습니다.</p>")
};
var data_get_er = function(){
	window.location.replace('/token_error.php');
};
var error_fc_list = new Array();
error_fc_list['login'] = login_er;
error_fc_list['mobli_paging'] = data_get_er;


//paing call. login_prsc
function ajax_call(method, action_url, form_data, sc_fc, flag){
	$.ajax({
		type : method,
		url : action_url,
		dataType : 'json',
		data : form_data,
		success : function(data){
			if(data.status == 200){
				if(sc_fc){ sc_fc(data);}
			}else{
				error_fc_list[flag]();					
			}
		},
		error : function(data){
			//dump(data)
			console.log("paing call error");
			window.location.replace('/template/error.html');
		}
	});
}
