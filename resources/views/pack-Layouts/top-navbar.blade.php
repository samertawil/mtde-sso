
     <header>
         <nav class="navbar bg-dark  navbar-expand-md navbar-dark justify-content-between align-items-center py-3 ">
             <div class="container">

                 <button class="navbar-toggler my-3" type="button" data-bs-toggle="collapse" data-bs-target=".navmenu">
                     <span class="navbar-toggler-icon " style="color: yellow !important;"></span>
                 </button>


                 <div class="collapse navbar-collapse navmenu ">
                     <ul class="navbar-nav " style="text-align: start;">
                         <li id="t1" class="nav-item px-2"><a href="{{ route('main.page') }}"
                                 class="nav-link">الرئيسية</a>
                         </li>
                         {{-- <li class=" nav-item px-2"><a href="" class="nav-link">بيانات المستفيد</a> --}}
                         </li>
                         <div class="dropdown nav-item ">
                             <button class="btn  dropdown-toggle  nav-link" type="button" id="address_menu"
                                 data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                 المساعدات الإغاثية
                             </button>

                             <div class="dropdown-menu text-right" aria-labelledby="address_menu">

                                 <a class="dropdown-item" href="{{ route('aid.myInfo') }}">
                                     بيانات المستفيد </a>
                                 {{-- <a class="dropdown-item" href="{{ route('aid.recievedCoupon') }}">
                                    استعلام عن الكوبونات المستلمة</a> --}}



                             </div>
                         </div>

                         <div class="dropdown nav-item ">
                             <button class="btn  dropdown-toggle  nav-link" type="button" id="address_menu"
                                 data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                 بوابة الشكاوي
                             </button>

                             <div class="dropdown-menu text-right" aria-labelledby="address_menu">

                                 <a class="dropdown-item" href="{{ route('gethelp') }}">
                                     تقديم شكوى </a>


                                 <a class="dropdown-item" href="{{ route('gethelpAll') }}">
                                     الشكاوي المقدمة</a>
                                 <div class="dropdown-divider"></div>
                                 @if (Auth::user()->user_type === 'employee' || Auth::user()->user_type === 'superadmin')
                                     <a class="dropdown-item" href="{{ route('providerhelp') }}">
                                         اضافة شكوى</a>

                                     <a class="dropdown-item" href="{{ route('providerHelpAll') }}">
                                         عرض شكاوى المواطنين </a>
                                 @endif



                             </div>
                         </div>


                         @if (Auth::user()->user_type === 'employee' || Auth::user()->user_type === 'superadmin')
                             <div class="dropdown nav-item ">
                                 <button class="btn  dropdown-toggle  nav-link" type="button" id="address_menu"
                                     data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                     الادارة
                                 </button>

                                 <div class="dropdown-menu text-right" aria-labelledby="address_menu">

                                     <a class="dropdown-item" href="{{ route('aid.emp.check') }}">
                             بحث  </a>

                             <a class="dropdown-item" href="{{ route('aid.emp.exportFile') }}">
                                تصدير  </a>
   



                                 </div>
                             </div>
                         @endif
                         <li class="nav-item px-2"><a href="{{ route('about-us') }}" class="nav-link">حول الاغاثة</a></li>


                     </ul>
                 </div>


                 <div>

                     <p class="h5 text-light bg-danger text-center">المساعدات والإغاثة الإنسانية </p>

                     <div class="d-flex justify-content-between align-items-center">
                         <button
                             class="btn btn-small text-muted"><small>{{ Auth::user()->full_name ?? 'Guest' }}</small></button>

                         <form action="{{ route('logout') }}" method="post">
                             @csrf

                             <button type="submit" class="btn btn-small text-muted ">
                                 <small>تسجيل
                                     خروج</small> </button>
                         </form>

                     </div>

                 </div>
             </div>

         </nav>


     </header>
 
