function dump(obj) {
	//it's only use at debugging.
    var out = '';
    for (var i in obj) {
        out += i + ": " + obj[i] + "\n";
    }

    console.log(out);
    var pre = document.createElement('pre');
    pre.innerHTML = out;
    document.body.appendChild(pre)
}

var er_fc_arr = function(flag){
	if(flag == "login"){
		$("#message").html("<p styple='color:green; font-weight:bold'>아이디 또는 비밀번호가 틀렸습니다.</p>")
	}else if(flag == "data_get"){
		window.location.replace('/token_error.php');
	}
}

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
				er_fc_arr(flag);					
			}
		},
		error : function(data){
			// dump(data);
			// console.log("ajax call error");
			window.location.replace('/template/error.html');
		}
	});
}
