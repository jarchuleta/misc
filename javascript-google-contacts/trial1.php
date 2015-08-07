<html>
  <head>
    <script src="https://apis.google.com/js/client.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
    <script>
	var AuthToken;
      function autoFetch() {
        var config = {
          'client_id': '332198823643-peovb75bc1qf5g6vjg8ebqtdii1ii5i4.apps.googleusercontent.com',
          'scope': 'https://www.google.com/m8/feeds',
		  'immediate': true
        };
        gapi.auth.authorize(config, function() {
          AuthToken = gapi.auth.getToken();
        });
      }
      function fetch(token) {
	  
        $.ajax({
          url: 'https://www.google.com/m8/feeds/contacts/james.archuleta@gmail.com/full?alt=json&q=test&max-results=10000',
          dataType: 'jsonp',
          data: token
        }).complete(function(data) {
            console.log(JSON.stringify(data));
			
			$.each(data.responseJSON.feed.entry, function(index, value){
					$('#results').append(index + " " + value.title.$t + " id: " + value.id.$t  +" <br>");
			});
			
			
          });
      }
	  
	  
	  function fetch2(){
		fetch(AuthToken);
		
	  }
	  
	  function create(){
		
		entry = {'entry' : {
			'category':'contact',
			'name': { 'givenName':'Tolga' },
			'phoneNumber':'(206)555-1213'
		  }};
		
		$.ajax({
          url: 'https://www.google.com/m8/feeds/contacts/james.archuleta@gmail.com/full',
          dataType: 'jsonp',
          //data: AuthToken,
		  type: 'POST',
		  data: { 
		  'access_token' : AuthToken.access_token,
		  AuthToken,  
				 entry} 
        }).complete(function(data) {
            console.log(JSON.stringify(data));
			
						
			
          })
		  .error(function(data, status, error) {
			console.log(error);	
		  });
		
	  }
	  
	   function getId(){
		
		$.ajax({
          url: 'https://www.google.com/m8/feeds/contacts/james.archuleta@gmail.com/full/635204bf8e9df825'
		  +'?alt=json',
          dataType: 'jsonp',
          data: AuthToken,
        }).complete(function(data) {
            console.log(JSON.stringify(data));
			
			$('#results').html(JSON.stringify(data));
			
			
			
			
          });
		
	  }
	  
	  function getGroups() {
	  
        $.ajax({
          url: 'https://www.google.com/m8/feeds/groups/james.archuleta@gmail.com/full?alt=json&max-results=10000',
          dataType: 'jsonp',
          data: AuthToken
        }).complete(function(data) {
            console.log(JSON.stringify(data));
			
			$.each(data.responseJSON.feed.entry, function(index, value){
					$('#results').append(index + " " + value.title.$t + " id: " + value.id.$t  +" <br>");
			});
			
			
          });
      }
	  
    </script>
  </head>

  <body onload="autoFetch();">
    <button onclick="fetch2();">GET CONTACTS FEED</button>
	<button onclick="create();">Create</button>
	<button onclick="getId();">GetId</button>
	<button onclick="getGroups();">Get Groups</button>
	
	
	<div id="results"></div>
  </body>
</html>