$("#addUser").validate({ 
  	rules:{
	  	username:{
			required:true,
			minlength: 3,
		},
		password:{
			required:true,
			minlength: 1,		
		},
		role:{
			required:true,
		}
	},
	  
	messages:{
		username:{
			required:"Vui lòng nhập vào tên đăng nhập !",
			minlength:"Tên đăng nhập ít nhất 3 ký tự !",
		},
		password:{
			required:"Vui lòng nhập vào mật khẩu !",
			minlength:"Tên đăng nhập ít nhất 1 ký tự !",
		},
		role:{
			required:"Vui lòng chọn quyền !",	
		}	
	},
});


