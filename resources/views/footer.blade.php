<footer class="footer_area p_120">
            <div class="container">
                <div class="row footer_inner">
                    <div class="col-lg-3 col-md-6 col-sm-12">
                       <h3>AWN</h3>
                       <ul class="contact_list list-unstyled">
                           <li><i class="fa fa-map"></i>&emsp;Mandalay, Myanmar.</li>
                           <li class="my-2"><i class="fa fa-phone"></i>&emsp;+959 123-456-789</li>
                           <li><i class="fa fa-envelope">&emsp;example@example.com</i></li>
                       </ul>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-12">
                        <h4>Useful Links</h4>
                        <ul class="links_list list-unstyled">
                            <li><a href="/">Home</a></li>
                            <li><a href="/portfolio">Portfolio</a></li>
                            <li><a href="/service">Services</a></li>
                            <li><a href="/blog">Blog</a></li>
                            <li><a href="/contact">Contact</a></li>
                        </ul>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-12">
                        <h4>Recent Posts</h4>
                        <ul class="links_list list-unstyled" id="footer_post">
                        </ul>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-12">
                        <h4>Connect With Me</h4>
                        <ul class="footer_icon_list list-unstyled mt-4">
                            <li><i class="fa fa-facebook-f"></i></li>
                            <li><i class="fa fa-twitter"></i></li>
                            <li><i class="fa fa-instagram"></i></li>
                        </ul>
                    </div>
                </div>
                <hr style="width: 100%; border:1px solid #777777;">
                <div class="row text-center">
                    <div class="col-lg-12">
                        <p>Copyright &copy;<script>document.write(new Date().getFullYear());</script>&nbsp;All rights reserved. (AWN Portfolio V 1.0.0)</p>
                    </div>
                </div>
            </div>
        </footer>
        <!--================End Footer Area =================-->
        
        <!--================Contact Success and Error message Area =================-->
        <div id="success" class="modal modal-message fade" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <i class="fa fa-close"></i>
                        </button>
                        <h2>Thank you</h2>
                        <p>Your message is successfully sent...</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modals error -->

        <div id="error" class="modal modal-message fade" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <i class="fa fa-close"></i>
                        </button>
                        <h2>Sorry !</h2>
                        <p> Something went wrong </p>
                    </div>
                </div>
            </div>
        </div>
        <!--================End Contact Success and Error message Area =================-->
        
        
        
        
        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        
    </body>
    <script>
         $(document).ready(function($) {
                $.ajax({
                  url: "{{route("gp")}}",
                  type: 'GET',
                  success: function(response){
                    var html='';
                    var html2='';
                    $.each( response ,function(index, v) {
                        var text=v.title;
                        var text_only=$(text).text();
                        if (text_only.length>=10) {
                            var check_text=text_only.substring(10,0)+"...";
                            text_only=check_text;
                        }
                        html+=`
                                <li><a href="/single_blog/${v.id}"><img src="${v.img}" class="footer_post_img" alt="">${text}</a></li>
                                `
                    });
                    $('#footer_post').html(html);
                    },
                    error: function(request, status, error){
                    }
                });                
            });
    </script>
</html>