    //Function to Open/Close Responsive Navbar
    function opened(){
        let navi = document.querySelector("#header");
        navi.classList.toggle('active');
        let navi2 = document.querySelector(".main-block");
        navi2.classList.toggle('lockscroll');

        // let activeclass = document.getElementByClassName('active').length>0;
        // if(activeclass){
        //     alert('hi');
        //     $('#cartdiv').css('display','none');
        // }
    }
    function addcart(index){
        var pid = $('#pid'+index).val();
        var qty = $('#qty'+index).val();
        var weight = $('#weight'+index).val();
        $.ajax({
            url:"addCart.php",
            type:"POST",
            data:{pid : pid, qty:qty, weight: weight},
            success: function(){
                alert('hi');
            },
        });
    }

    $('.goback div').click(function(){
        $('.main-block').css('display','block');
        $('.search-results').empty();
        $('.goback').css('display','none');
        $('.search-results').css('display','none');
    });

    $(document).ready(function(){
        
        $('.mr-2').keyup(function(){
            $('.search-results').empty();
            var text = this.value;
            $.ajax({
            type: "POST",
            url: "search.php",
            data:{detail: text},
            success:function(data){
                $('.main-block').css('display','none');
                $('.goback').css('display','flex');
                $('.search-results').css('display','flex');
                $('.search-results').append(data); 
            
    
                // if(demo==""){
    
                    // $('.search-results').css('text-align','center');
                    // $('.search-results').css('position','relative');
                    // $('.search-results').css('top','50%');
                    // $('.search-results').css('left','50%');
                    // $('.search-results').css('transform','translate(-50%,-50%)');    
                // }   
            },
        });
    });
});
  