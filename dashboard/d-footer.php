
<hr>
        <div class="container mt-4">
            <p>Footer text here </p>
        </div>

      </div>
    </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

  <script>
    $(document).ready(function(){
      $(".confirm_to_delet").on("click", function(e){
        
        if (confirm("Confirm ... !!??") == false) {
          e.preventDefault();
        } 
      });
    });
  </script>
</body>
</html>