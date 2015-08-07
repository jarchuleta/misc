<html>
  <head>

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
    <script>
		function OnChange(){
				
				var string = $('#text').val();
				
				findEmail(string);
				findPhoneNumber(string);
				
				
		}
		
		function findEmail(stringToSearchIn){
		
		

		//var re = /(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))/;
		//var re = /^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i;
		  var re = /(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))/;


		var extractedEmail=re.exec(stringToSearchIn);

			$('#email').val(extractedEmail[0]);
		
		}
		
		function findPhoneNumber(stringToSearchIn){
			//var re = /^\(?(\d{3})\)?[- ]?(\d{3})[- ]?(\d{4})$/;
			var re = /((\(\d{3}\) ?)|(\d{3}.?))?\d{3}.?\d{4}/;

			var extracted=re.exec(stringToSearchIn);

			$('#phone').val(extracted[0]);
		}
    </script>
  </head>

  <body>
  
  
  <textarea id="text" style="margin: 0px; width: 444px; height: 142px;" onchange="OnChange()"></textarea>
   <br><br><br><br><br>
   Business name <input id="bname" style="width:350px;" /><br>
   Name<input id="name" style="width:350px;" /><br>
   Phone number<input id="phone" style="width:350px;" /><br>
   Email address<input id="email"  style="width:350px;"/><br>
   
  </body>
</html>