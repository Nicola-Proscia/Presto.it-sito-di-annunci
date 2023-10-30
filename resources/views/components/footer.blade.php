
<footer class="footer">
    <div class="container bottom_border">
        <div class="row">
            <div class="col-12 col-md-3 d-flex flex-column align-items-start">
                <h5 class="headin5_amrc col_white_amrc pt2">{{__('ui.Contacts')}}</h5>
                <!--headin5_amrc-->
                <p class="mb10"></p>
                <p class=""><a href="https://www.google.it/maps/place/Aulab+Hackademy/@41.1168417,16.8475999,17z/data=!3m1!4b1!4m6!3m5!1s0x1347e8bcca130e17:0x47ce9d5124576e73!8m2!3d41.1168417!4d16.8501748!16s%2Fg%2F11c52rtp7r?entry=ttu" class="footerContact"><i class="fa fa-location-arrow text-white me-1"></i>Strada S. Giorgio Martire, 2D, 70124 Bari</a></p>
                <p><a href="mailto:web@aulab.it" class="footerContact"><i class="fa fa fa-envelope text-white me-1"></i>web@aulab.it</a></p>
                <p><i class="fa fa-phone text-white me-1"></i><span class="text-white">+393792238588</span></p>
            </div>


            <!--Categorie-->
            <div class="col-12 col-md-6">
                <h5 class="headin5_amrc col_white_amrc pt2 text-center">{{__('ui.Categories')}}</h5>
                <div class="row">
                <div class="col-6 d-flex flex-column align-items-center">
                <ul class="footer_ul_amrc">
                    <li><a href="http://127.0.0.1:8000/announcement/2">{{__('ui.Abbigliamento')}}</a></li>
                    <li><a href="http://127.0.0.1:8000/announcement/9">{{__('ui.Accessori')}}</a></li>
                    <li><a href="http://127.0.0.1:8000/announcement/1">{{__('ui.Arredamento')}}</a></li>
                    <li><a href="http://127.0.0.1:8000/announcement/6">{{__('ui.Elettrodomestici')}}</a></li>
                    <li><a href="http://127.0.0.1:8000/announcement/3">{{__('ui.Giardinaggio')}}</a></li>
                </ul>
                </div>
                <div class="col-6 d-flex flex-column align-items-center">
                    <ul class="footer_ul_amrc">
                    <li><a href="http://127.0.0.1:8000/announcement/7">{{__('ui.Giochi')}}</a></li>
                    <li><a href="http://127.0.0.1:8000/announcement/4">{{__('ui.Informatica')}}</a></li>
                    <li><a href="http://127.0.0.1:8000/announcement/10">{{__('ui.Libri')}}</a></li>
                    <li><a href="http://127.0.0.1:8000/announcement/5">{{__('ui.Motori')}}</a></li>
                    <li><a href="http://127.0.0.1:8000/announcement/8">{{__('ui.Sport')}}</a></li>
                    </ul>
                </div>
            </div>
            
            </div>


            <div class="col-12 col-md-3 d-flex flex-column align-items-end">
                <h5 class="headin5_amrc col_white_amrc pt2 ">{{__('ui.follow')}}</h5>

                <!--headin5_amrc ends here-->

                <ul class="footer_ul2_amrc ">
                    <li class="my-2"><a href="https://x.com/auLAB_it?t=ard8GqQ-yzowxx_AtWaA6A&s=08"><i class="fab fa-x-twitter fleft padding-right"></i> Twitter </a>
                    
                    </li>
                    <li class="my-2"><a href="https://www.facebook.com/aulab/"><i class="fab fa-facebook fleft padding-right"></i> Facebook </a>
                    </li>
                    <li class="my-2"><a href="https://www.tiktok.com/@aulab.it"><i class="fab fa-tiktok fleft padding-right"></i> Tiktok </a>
                    </li>
                </ul>

            </div>
        </div>
    </div>


    <div class="container-fluid  text-center">

        <ul class="foote_bottom_ul_amrc">
            <li><a href="/">{{__('ui.home')}}</a></li>
            <li><a href="http://aulab.it">{{__('ui.about')}}</a></li>
            <li><a href="http://127.0.0.1:8000/announcement/index">{{__('ui.Announcements')}}</a></li>
            <li><a href="mailto:web@aulab.it">{{__('ui.Contacts')}}</a></li>
            <li class="">
                
                <a href="{{ route('become.revisor') }}">
                    <button class="btn text-whiteCus border-whiteCus sendCus mx-2">{{ __('ui.Work') }}</button>
                </a>
            
            </li>
        </ul>

        <!--foote_bottom_ul_amrc ends here-->
        <p class="text-center">{{__('ui.Copyright')}} @2023 | {{__('ui.designed')}} <a href="#">Assassin's Coders Company</a></p>

    </div>

</footer>
