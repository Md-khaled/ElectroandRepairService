<style type="text/css">
    .hide{
        display: none;
    }
</style>  
<div class="container hide hh">
       
    <div class="row">
        <div class="chatbox chatbox22 chatbox--tray">
    <div class="chatbox__title">
        <h5><a href="javascript:void()">Leave a message</a></h5>
        <!--<button class="chatbox__title__tray">
            <span></span>
        </button>-->
        <button class="chatbox__title__close">
            <span>
                <svg viewBox="0 0 12 12" width="12px" height="12px">
                    <line stroke="#FFFFFF" x1="11.75" y1="0.25" x2="0.25" y2="11.75"></line>
                    <line stroke="#FFFFFF" x1="11.75" y1="11.75" x2="0.25" y2="0.25"></line>
                </svg>
            </span>
        </button>
    </div>
    <div class="chatbox__body">
        <div class="chatbox__body__message chatbox__body__message--left">
        
        <div class="chatbox_timing">
        <ul>
        <li><a href="#"><i class="fa fa-calendar"></i> 22/11/2018</a></li>
            <li><a href="#"><i class="fa fa-clock-o"></i> 7:00 PM</a></a></li>
        </ul>
        </div>
            <img src="https://www.gstatic.com/webp/gallery/2.jpg" alt="Picture">
            <div class="clearfix"></div>
            <div class="ul_section_full">
            <ul class="ul_msg">
            <li><strong>Person Name</strong></li>
            <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit. </li>
            </ul>
            <div class="clearfix"></div>
            <ul class="ul_msg2">
            <li><a href="#"><i class="fa fa-pencil"></i> </a></li>
            <li><a href="#"><i class="fa fa-trash chat-trash"></i></a></li>
            </ul>
            </div>
             
        </div>
        <div class="chatbox__body__message chatbox__body__message--right">
        
        <div class="chatbox_timing">
        <ul>
        <li><a href="#"><i class="fa fa-calendar"></i> 22/11/2018</a></li>
            <li><a href="#"><i class="fa fa-clock-o"></i> 7:00 PM</a></a></li>
        </ul>
        </div>
    
            <img src="https://www.gstatic.com/webp/gallery/2.jpg" alt="Picture">
            <div class="clearfix"></div>
            <div class="ul_section_full">
            <ul class="ul_msg">
            <li><strong>Person Name</strong></li>
            <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit. </li>
            </ul>
            <div class="clearfix"></div>
            <ul class="ul_msg2">
            <li><a href="#"><i class="fa fa-pencil"></i> </a></li>
            <li><a href="#"><i class="fa fa-trash chat-trash"></i></a></li>
            </ul>
            </div>
             
        </div>
        <div class="chatbox__body__message chatbox__body__message--left">
        
        <div class="chatbox_timing">
        <ul>
        <li><a href="#"><i class="fa fa-calendar"></i> 22/11/2018</a></li>
            <li><a href="#"><i class="fa fa-clock-o"></i> 7:00 PM</a></a></li>
        </ul>
        </div>
    
            <img src="https://www.gstatic.com/webp/gallery/2.jpg" alt="Picture">
            <div class="clearfix"></div>
            <div class="ul_section_full">
            <ul class="ul_msg">
            <li><strong>Person Name</strong></li>
            <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit. </li>
            </ul>
            <div class="clearfix"></div>
            <ul class="ul_msg2">
            <li><a href="#"><i class="fa fa-pencil"></i> </a></li>
            <li><a href="#"><i class="fa fa-trash chat-trash"></i></a></li>
            </ul>
            </div>
             
        </div>
        <div class="chatbox__body__message chatbox__body__message--right">
        
        <div class="chatbox_timing">
        <ul>
        <li><a href="#"><i class="fa fa-calendar"></i> 22/11/2018</a></li>
            <li><a href="#"><i class="fa fa-clock-o"></i> 7:00 PM</a></a></li>
        </ul>
        </div>
    
            <img src="https://www.gstatic.com/webp/gallery/2.jpg" alt="Picture">
            <div class="clearfix"></div>
            <div class="ul_section_full">
            <ul class="ul_msg">
            <li><strong>Person Name</strong></li>
            <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit. </li>
            </ul>
            <div class="clearfix"></div>
            <ul class="ul_msg2">
            <li><a href="#"><i class="fa fa-pencil"></i> </a></li>
            <li><a href="#"><i class="fa fa-trash chat-trash"></i></a></li>
            </ul>
            </div>
             
        </div>
        <div class="chatbox__body__message chatbox__body__message--left">
        
        <div class="chatbox_timing">
        <ul>
        <li><a href="#"><i class="fa fa-calendar"></i> 22/11/2018</a></li>
            <li><a href="#"><i class="fa fa-clock-o"></i> 7:00 PM</a></a></li>
        </ul>
        </div>
    
            <img src="https://www.gstatic.com/webp/gallery/2.jpg" alt="Picture">
            <div class="clearfix"></div>
            <div class="ul_section_full">
            <ul class="ul_msg">
            <li><strong>Person Name</strong></li>
            <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit. </li>
            </ul>
            <div class="clearfix"></div>
            <ul class="ul_msg2">
            <li><a href="#"><i class="fa fa-pencil"></i> </a></li>
            <li><a href="#"><i class="fa fa-trash chat-trash"></i></a></li>
            </ul>
            </div>
             
        </div>
    </div>
    <chats-component></chats-component>
</div>
        
    </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>    
  
    <script type="text/javascript">
     
    $(document).ready(function() {
        var $chatbox = $('.chatbox'),
            $chatboxTitle = $('.chatbox__title'),
            $chatboxTitleClose = $('.chatbox__title__close'),
            $chatboxCredentials = $('.chatbox__credentials');
            $(".chaticon").on("click",function(e){
       // console.log('sfsfa');
        $(".hh").removeClass("hide");
        $chatbox.toggleClass('chatbox--tray');
        $("#chat").addClass("hide");

    });
            /*
        $chatboxTitle.on('click', function() {
            console.log('toggle');
            $chatbox.toggleClass('chatbox--tray');
        });
        */
        $chatboxTitleClose.on('click', function(e) {
            //console.log('close add');

            e.stopPropagation();
        $("#chat").removeClass("hide");
            $chatbox.toggleClass('chatbox--tray');
            $(".hh").addClass('hide');
        });
       
        
    });

    </script>