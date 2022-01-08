@extends('layouts.main')

@section('content')
    <div id="content" class="main-content-wrapper">

        <!-- Page Headers -->
        <section class="page-headers">
            <div class="container-fluid">
                <div class="row">
                    <div class="order-2 col-md-4 ms-auto">
                        <h1>Support Centre</h1>
                        <ul class="pghd-breadcrumbs">
                            <li><a href="/">Home</a></li>
                            <li>Support Centre</li>
                        </ul>
                    </div>
                    <div class="order-1 col-md-3">
                        <h3 class="text-with-icon"><i class="far fa-life-ring"></i>Welcome to our Support Centre.</h3>
                    </div>
                </div>
            </div>
        </section>




        <div id="content" class="main-content-wrapper">
            <div class="page-content-inner inside-manama-content">

                <!-- About us Area -->

                <div class="container">
                    <div class="row justify-content-center">

                        <div class="col-md-10 col-12" id="main-content">

                            <div class="row justify-content-center">
                                <div class="col-7 mb-5">
                                    <h4 class="text-center">We are glad to help. If you have any questions regarding our products or purchases you have made,
                                        you can refer to our Frequently Asked Questions Section for self resolutions.</h4>
                                </div>
                                <div class="w100"></div>
                                <div class="col-md-8 col-12">
                                    <h2 class="manama-red">Frequently Asked Questions</h2>

                                    <div id="faq" class="faq-tab">
                                        <h2 class="faqAsk">I am only able to add 2 bottles per flavour to my cart.</h2>
                                        <div class="faqAns">
                                            <p>We are currently limiting to 2 bottles per flavour order . Incase you need to order more then 2 bottles, you can always create a new order. You can however buy another flavours (2 bottles per flavour).</p>
                                        </div>
                                        <h2 class="faqAsk">I am outside India, I need to buy from Manama.</h2>
                                        <div class="faqAns">
                                            <p>We are currently only shipping our products within India. IF you have a specific requirements, please get in touch thru our <a href="{{route('contact-us')}}">contact</a> page</p>
                                        </div>
                                        <h2 class="faqAsk">I made a purchase, and my money got debited but I am yet to recieve a confirmation email or sms</h2>
                                        <div class="faqAns">
                                            <p>We are extremely sorry for the inconvenience caused to you. you need not worry about the transaction. Incase the order came thru and you didn't recieve an intimation, our representative will call you on your registered number, to confirm your order, also you will get an email and sms from our payment processor "PayU Money". In the event we did't recieve your payment, you should get a refund within 48 to 96 hours (2 to 4 Bank Working Days). Incase you don't recieve there after, please forward your transaction email or sms confirming transaction from PayU. We will get back to you with a solution.</p>
                                        </div>
                                        <h2 class="faqAsk">What is the procedure for Returning Products?</h2>
                                        <div class="faqAns">
                                            <p>Since we deal in food items, we have a strict no return and refund policy. Incase you have any complaints or recieved spoiled goods, please contact us immediately or incase the goods were damaged on transit, please click a photo of the package opened and email us. Please do not forget to mention your Order ID along with your email after which we will provide a resolution.</p>
                                        </div>
                                        <h2 class="faqAsk">Who is Outlet Mall? Why didn't I get a bill from Manama Farms &amp; Foods?</h2>
                                        <div class="faqAns">
                                            <p>Outlet Mall is our authorized distrubutor and also the numero uno store. All our online orders are processed by the said distributor.</p>
                                        </div>
                                        <h2 class="faqAsk">How to buy products which are labelled "Unavailable Online"</h2>
                                        <div class="faqAns">
                                            <p>Products labelled  "Unavailable Online" are only available with our authorized distributors and partner stores. IF you wish to know more about them, get in <a href="{{route('contact-us')}}">touch</a> with us for more information</p>
                                        </div>
                                        <h2 class="faqAsk">Do you have a emailing list? How to subscribe or unsubscribe</h2>
                                        <div class="faqAns">
                                            <p>When you register, you are asked if you would like to get information and updates from Manama Farms &amp; Foods. Incase you have opted out and want to opt in again, visit your <a href="my-account.html">dashboard</a> and click on "Manage Subscription". Similarly you can opt out at the same page.</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4 col-12 pt-3">
                                    <p><b><small>If you still have questions, you may contact us using either of these options.
                                                Please note for Business Inquiries please visit our contact us section.</small></b></p>
                                    <a href="https://api.whatsapp.com/send?phone=919822528252" target="_blank" class="support-tab">
                                        <i class="fab fa-whatsapp"></i>
                                        Connect on WhatsApp<span>+919822528252<small>(10am to 6pm - Monday to Saturday)</small></span></a>
                                    <a href="tel://+919504009009" target="_blank" class="support-tab">
                                        <i class="fas fa-phone-volume"></i>
                                        Call us<span>+919504009009<small>(10am to 6pm - Monday to Saturday)</small></span></a>
                                    <a href="mailto:info@manamatoppings.com" target="_blank" class="support-tab">
                                        <i class="fas fa-at"></i>
                                        Email your Query<span>info@manamatoppings.com<small>(Please mention yoour Order No. or PayU Money Transaction No. along with screenshot)</small></span></a>

                                </div>

                            </div>
                        </div>
                    </div>

                </div>


            </div>
            <!-- Main Content Wrapper Ends -->
        </div>
    </div>
@endsection
