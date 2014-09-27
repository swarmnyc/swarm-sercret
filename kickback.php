<!-- CHANGE STATUS FIELD TO EDIT WHAT WILL BE AUTOMATICALLY ADDED TO YOUR TWEETS -->    
    
    <script type="text/javascript">
      jQuery(document).ready(function($) {
        $('#thankPageTweetSubmit').click(function(event) {
          var status = $("#thankPageTweetForm textarea").val();
          status += 'w/ @swarmnyc';
          $.ajax({
            url: 'index.php',
            type: 'POST',
            data: {status: status},
          })
          .done(function() {
            location.reload();
            console.log("submit tweet done");
          })
          .fail(function() {
            console.log("submit tweet error");
          });
          
        });
      });
    </script>