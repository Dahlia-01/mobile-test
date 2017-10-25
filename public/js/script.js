jQuery(document).ready(function($){
     
    $('#sender').on('click', function () {
            
            var form = $('form.cd-form1');
            
            $.ajax({
            url    : form.attr('action'),
            type   : 'post',
            data   : form.serialize(),
            success: function (response) 
            {
                if(response==='1'){
                    alert('New Track Submitted');
                    
                }else{
                   //alert(response.typeof);
                }
                //$('.sent').html(getupdatedata);
                //console.log(getupdatedata);
            },
            error  : function () 
            {
                console.log('internal server error');
            }
            });
            return false;
         });

    $('#returned').on('click', function () {
            theurl=$(this).data('url');
            orderid=$('#orderid').text();
            //alert(theurl+orderid);
            //return false;
            $.ajax({
            url    : theurl+orderid,
            type   : 'get',
            
            success: function (response) 
            {
                if(response==='1'){
                    alert('The package has been set as returned');
                    
                }else{
                   alert(response);
                }
                //$('.sent').html(getupdatedata);
                //console.log(getupdatedata);
            },
            error  : function () 
            {
                console.log('internal server error');
            }
            });
            return false;
         });
    


    $('#set_pending').on('click', function () {
            
            
            
            theurl=$(this).data('url');
            orderid=$('#orderid').text();
            //alert(theurl+orderid);
            //return false;
            $.ajax({
            url    : theurl+orderid,
            type   : 'get',
            
            success: function (response) 
            {
                if(response==='1'){
                    alert('The package is now in transit');
                    
                }else{
                   alert(response);
                }
                //$('.sent').html(getupdatedata);
                //console.log(getupdatedata);
            },
            error  : function () 
            {
                console.log('internal server error');
            }
            });
            return false;
         });

	var formModal = $('.cd-user-modal'),
		formLogin = formModal.find('#cd-login'),
		formSignup = formModal.find('#cd-signup'),
		formForgotPassword = formModal.find('#cd-reset-password'),
		formModalTab = $('.cd-switcher'),
		tabLogin = formModalTab.children('li').eq(0).children('a'),
		tabSignup = formModalTab.children('li').eq(1).children('a'),
		forgotPasswordLink = formLogin.find('.cd-form-bottom-message a'),
		backToLoginLink = formForgotPassword.find('.cd-form-bottom-message a'),
		mainNav = $('.main-nav');

	//open modal
	mainNav.on('click', function(event){
		$(event.target).is(mainNav) && mainNav.children('ul').toggleClass('is-visible');
        var id=$(this).data('shiping');
        var details=$(this).data('details');
        var spliters=details.split('|');
        var name=spliters[0]+' '+spliters[1];
        var phone=spliters[2];
        var email=spliters[3];
        var state=spliters[4];
        var destination=spliters[5];
        var orderid=spliters[8];
        var summary=spliters[7];
        var orderdate=spliters[6];
        $('#name').html(name);
        $('#phone').html(phone);
        $('#email').html(email);
        $('#state').html(state);
        $('#destination').html(destination);
        $('#orderid').html(orderid);
        $('#summary').html('<pre>'+summary+'</pre>');
        $('#orderdate').html(orderdate);
        $('#shippingid').val(id);
	});

	//open sign-up form
	mainNav.on('click', '.cd-signup', signup_selected);
	//open login-form form
	mainNav.on('click', '.cd-signin', login_selected);

	//close modal
	formModal.on('click', function(event){
		if( $(event.target).is(formModal) || $(event.target).is('.cd-close-form') ) {
			formModal.removeClass('is-visible');
		}	
	});
	//close modal when clicking the esc keyboard button
	$(document).keyup(function(event){
    	if(event.which=='27'){
    		formModal.removeClass('is-visible');
	    }
    });

	//switch from a tab to another
	formModalTab.on('click', function(event) {
		event.preventDefault();
		( $(event.target).is( tabLogin ) ) ? login_selected() : signup_selected();
	});

	//hide or show password
	$('.hide-password').on('click', function(){
		var togglePass= $(this),
			passwordField = togglePass.prev('input');
		
		( 'password' == passwordField.attr('type') ) ? passwordField.attr('type', 'text') : passwordField.attr('type', 'password');
		( 'Hide' == togglePass.text() ) ? togglePass.text('Show') : togglePass.text('Hide');
		//focus and move cursor to the end of input field
		passwordField.putCursorAtEnd();
	});

	//show forgot-password form 
	forgotPasswordLink.on('click', function(event){
		event.preventDefault();
		forgot_password_selected();
	});

	//back to login from the forgot-password form
	backToLoginLink.on('click', function(event){
		event.preventDefault();
		login_selected();
	});

	function login_selected(){
		mainNav.children('ul').removeClass('is-visible');
		formModal.addClass('is-visible');
		formLogin.addClass('is-selected');
		formSignup.removeClass('is-selected');
		formForgotPassword.removeClass('is-selected');
		tabLogin.addClass('selected');
		tabSignup.removeClass('selected');
	}

	function signup_selected(){
		mainNav.children('ul').removeClass('is-visible');
		formModal.addClass('is-visible');
		formLogin.removeClass('is-selected');
		formSignup.addClass('is-selected');
		formForgotPassword.removeClass('is-selected');
		tabLogin.removeClass('selected');
		tabSignup.addClass('selected');
	}

	function forgot_password_selected(){
		formLogin.removeClass('is-selected');
		formSignup.removeClass('is-selected');
		formForgotPassword.addClass('is-selected');
	}

	//REMOVE THIS - it's just to show error messages 
	


	//IE9 placeholder fallback
	//credits http://www.hagenburger.net/BLOG/HTML5-Input-Placeholder-Fix-With-jQuery.html
	if(!Modernizr.input.placeholder){
		$('[placeholder]').focus(function() {
			var input = $(this);
			if (input.val() == input.attr('placeholder')) {
				input.val('');
		  	}
		}).blur(function() {
		 	var input = $(this);
		  	if (input.val() == '' || input.val() == input.attr('placeholder')) {
				input.val(input.attr('placeholder'));
		  	}
		}).blur();
		$('[placeholder]').parents('form').submit(function() {
		  	$(this).find('[placeholder]').each(function() {
				var input = $(this);
				if (input.val() == input.attr('placeholder')) {
			 		input.val('');
				}
		  	})
		});
	}
    
    
    
    // ajax form starts here 
   
    

   

 


    
     
    

});


