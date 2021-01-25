<html>
	<head>
	</head>
	<body>
		<script>
                let userAgentString =  
                navigator.userAgent; 
          
            // Detect Chrome 
            let chromeAgent =  
                userAgentString.indexOf("Chrome") > -1; 
              let firefoxAgent =  
                userAgentString.indexOf("Firefox") > -1; 
          console.log(chromeAgent);
          console.log(firefoxAgent);
          console.log(userAgentString.indexOf("Chrome"));
          console.log(userAgentString.indexOf("FireFox"));
             var ip="<?php echo $localIP = getHostByName(getHostName());?>"+userAgentString.indexOf("Chrome");   
            if(userAgentString.indexOf("Firefox") > -1)
            {
            	var ip="<?php echo $localIP = getHostByName(getHostName());?>"+userAgentString.indexOf("Firefox");	
            } 
            console.log(ip);
		</script>
				
	</body>
</html>
