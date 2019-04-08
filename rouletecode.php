<style type="text/css"> 
 .main-header {background: #ee3a5c!important;}
 .rout_sec{margin-top: 100px;}
  
  .add_bet.blue, .add_bet.red, .add_bet.purple, .add_bet.orange, .add_bet.green, .add_bet.transparent  {
    text-indent: 112px;
    overflow: hidden !important;
    background-size: 70% !important;
    background-repeat: no-repeat !important;
    background-position: center !important;
}
.add_bet span {
    text-indent: 0px !important;
}
.add_bet .title_bet {
    position: relative;
    top: -4px;
    left: -3px;
    font-size: 9px;
}
.add_bet .amount_bet {
    position: relative;
    top: -16px;
    font-size: 11px;
    left: -2px;
}
.add_bet div {
    line-height: 0px;
    color: #000;
}
 .bet_no {
    background: none !important;
}
 
  .bet_no.blue {   text-indent: 0px;}
  .bet_no.red  {   text-indent: 0px;}
  .bet_no.purple  {   text-indent: 0px;}
  .bet_no.orange  {   text-indent: 0px;}
   .bet_no.transparent {   text-indent: 0px;}
  .bet_no.green  {   text-indent: 0px;}
 
   .bet_no.blue:before {display:initial ;}
   .bet_no.red:before {display:initial ;}
   .bet_no.purple:before {display:initial;}
    .bet_no.green:before {display:initial;}
    .bet_no.orange:before {display:initial;}
    .add_bet.transparent:before {display:initial;}

 
  .add_bet.blue:before {display:none; !important;}
   .add_bet.red:before {display:none; !important;}
   .add_bet.purple:before {display:none; !important;}
    .add_bet.green:before {display:none; !important;}
    .add_bet.orange:before {display:none; !important;}
    .add_bet.transparent:before {display:none; !important;}
    
    
    .ro-overlay {
                                    -webkit-box-sizing: content-box;
                                    box-sizing: content-box;
                                    height: 100%;
                                    padding: calc(.85% + 1px) 0 0 calc(3.7% + 1px);
                                    pointer-events: none;
                                    position: absolute;
                                    width: 100%;
                                }

                               

                        .ro-overlay > div {
                                    cursor: pointer;
                                }
                                .ro-overlay > div {
                                    border-radius: 3px;
                                    float: left;
                                    position: relative;
                                    pointer-events: all;
                                    z-index: 2;
                                }
                                .ro-split-h {
                                    height: 14%;
                                    margin-left: 3.8%;
                                    width: 3%;
                                    margin-top: 0;
                                }

                                .ro-split-v {
                                      height: 6%;
                                      width: 3.8%;
                                      margin-top: 0;
                                      margin-left: 0%;
                                  }

                                 .ro-corner:hover, .ro-split-h:hover, .ro-split-v:hover {
                                    background: rgba(251, 212, 0, 0.7);
                                }

                                  .clear-before {
                                      clear: both;
                                  }
                                 .ro-corner {
                                      margin-left: 0%;
                                      height: 4%;
                                      width: 3%;
                                      margin-top: 0%;
                                  }

                                  .t_green1 {
                                  border: 2px solid #d4d4d4;
                                  border-radius: 20px 0 0 20px;
                                  height: 168px !important;
                                  color: #fff;
                                  text-align: center;
                                  display: table-cell;
                                  vertical-align: middle;
                                  padding: 0 20px;
                                  position: absolute;
                                  z-index: 1;
                                  left: -36px;
                              }
                              .t_green1::before {
    position: absolute;
    background: #39b54a;
    border-radius: 50%;
    content: "";
    color: #fff;
    z-index: -1;
    padding: 17px;
    top: calc(50% - 19px);
    left: calc(50% - 18px);
}
.t_green1 span {
    position: relative;
    top: 43%;
    text-align: center;
}
.ro-overlay {

    top: -1%;
    left: -75px;
}

 
.pankaj {
    background-size: 100%;
        width: 42px;
    height: 42px;
    position: absolute;
    z-index: 9999;
    transform: translate(-50%, -50%);
    left: 50%;
    top: 50%;
}
.pankaj .title_bet {
    position: relative;
    top: 26px;
    left: 0px;
    font-size: 9px;
    text-align: center;
}
.pankaj .amount_bet {
    position: relative;
    top: 16px;
    font-size: 11px;
    left: -2px;
    text-align: center;
}
</style>
        <section class="rout_sec">
            <div class="container-fluid">
                <!-- <div class="row">                    
                    <canvas id="canvas" width="500" height="500"></canvas>
                    <input type="button" value="spin" onclick="spin();" style="float:left;" />
                </div>  -->

                  

                   <div class="row">
            
             
               <div class="dicettle fgamecommone">
               <img src="{{ url('themes/public/assets/images/roulttite.png')}}">
               <h2 class="gamtittle">Roulette</h2>
            </div>
            
            <div class="game-box-wrapper">
                     <h3>Latest bets</h3>
                     
                     <div class="roulebox">
                                 <div id="show_bet">
                                     @if(auth()->check())
                                     @foreach($latest_bets as $bet)
                                     @php  $status = $bet->total_receive_amount > 0 ? 5 : 2; @endphp
                                      <div class="rouletext{{ $status }}">
                                          <h5 type="button" data-id="{{ $bet->id }}" class="bet_details">
                                             {{ $bet->strike_final_value }}
                                        </h5>
                                     </div>&nbsp;
                                     @endforeach
                                    @endif
                                 </div>
                                 
                                 <script>
                                    $(document).on('click', '.bet_details', function(){
                                        $('#dicspop3').modal('show');
                                        $.ajax({
                                            url: "{{url('client/bet_details')}}",
                                            type: 'GET',
                                            data: { bet_id : $(this).data('id') },
                                            success: function (data, textStatus, jqXHR)
                                            {
                                                data = JSON.parse(data);
                                                $('#b_d_amt').text(data.amount);
                                                $('#b_d_bet_id').text(data.id);
                                                $('#b_d_game').text('Roulette');
                                                $('#b_d_roll').text(data.strike_final_value);
                                                $('#b_d_payout').text(data.payout);
                                                $('#b_d_profit').text(data.total_receive_amount);
                                                $('#b_d_name').text(data.user_info.name);
                                                $('#b_d_afiliates').text(data.user_info.affilates);
                                                $('#b_d_userimage').attr('src', data.user_info.image_url);
                                                $('#b_d_created_at').text(data.user_info.created_at);
                                            },
                                        });
                                         
                                    });
                                 </script>
                                 <!-- Modal -->
                              
                              @include('popup.popup')
                           </div>
                     
                     <!--<ul class="ro-results"></ul>-->
                   </div>
                 
            
                 <div class="col-lg-3 col-md-3 col-sm-12">
                  <figure class="wheell">
                      <div class="wheell_box">
                       <img class="whel_img" src="http://harebet.intermining.io/public/themes/public/assets/images/download5.png">
                       <canvas id="canvas" width="500" height="500"></canvas>
                       <!-- <input type="button" value="spin" onclick="spin();" style="float:left;" /> -->
                       </div>
                  </figure>
                </div>
                <div class="col-lg-9 col-md-9 col-sm-12 t_scroll">
                  
                 
                      <div class="table_inner">
                                          
                            <div  class="g_numb add_bet t_green1"><span>0</span></div>
                            <div class="first_row">
                            <div  class="g_numb add_bet t_red">3</div>
                            <div  class="g_numb add_bet t_black">6</div>
                            <div  class="g_numb add_bet t_red">9</div>
                            <div  class="g_numb add_bet t_red">12</div>
                            <div  class="g_numb add_bet t_black">15</div>
                            <div  class="g_numb add_bet t_red">18</div>
                            <div  class="g_numb add_bet t_red">21</div>
                            <div  class="g_numb add_bet t_black">24</div>
                            <div  class="g_numb add_bet t_red">27</div>
                            <div  class="g_numb add_bet t_red">30</div>
                            <div  class="g_numb add_bet t_black">33</div>
                            <div  class="g_numb add_bet t_red">36</div>
                            <div  class="g_numb add_bet ratio hover_out get_first_row">1:1</div>
                            </div>

                            <div class="clearfix"></div>
                            <div class="second_row">
                            <div  class="g_numb add_bet t_black">2</div>
                            <div  class="g_numb add_bet t_red">5</div>
                            <div  class="g_numb add_bet t_black">8</div>
                            <div  class="g_numb add_bet t_black">11</div>
                            <div  class="g_numb add_bet t_red">14</div>
                            <div  class="g_numb add_bet t_black">17</div>
                            <div  class="g_numb add_bet t_black">20</div>
                            <div  class="g_numb add_bet t_red">23</div>
                            <div  class="g_numb add_bet t_black">26</div>
                            <div  class="g_numb add_bet t_black">29</div>
                            <div  class="g_numb add_bet t_red">32</div>
                            <div  class="g_numb add_bet t_black">35</div>
                            <div  class="g_numb add_bet ratio hover_out get_second_row">1:2</div>

                            </div>

                            <div class="clearfix"></div>
                            <div class="third_row">
                            <div  class="g_numb add_bet t_red">1</div>
                            <div  class="g_numb add_bet t_black">4</div>
                            <div  class="g_numb add_bet t_red">7</div>
                            <div  class="g_numb add_bet t_black">10</div>
                            <div  class="g_numb add_bet t_black">13</div>
                            <div  class="g_numb add_bet t_red">16</div>
                            <div  class="g_numb add_bet t_red">19</div>
                            <div  class="g_numb add_bet t_black">22</div>
                            <div  class="g_numb add_bet t_red">25</div>
                            <div  class="g_numb add_bet t_black">28</div>
                            <div  class="g_numb add_bet t_black">31</div>
                            <div  class="g_numb add_bet t_red">34</div>
                            <div  class="g_numb add_bet ratio hover_out get_third_row">1:3</div>
                            </div>
                                  
                              <div class="ro-overlay">
                      <div data-nums="0,3" class="ro-split-h"><!----></div><div data-nums="3,6" class="ro-split-h"><!----></div><div data-nums="6,9" class="ro-split-h"><!----></div><div data-nums="9,12" class="ro-split-h"><!----></div><div data-nums="12,15" class="ro-split-h"><!----></div><div data-nums="15,18" class="ro-split-h"><!----></div><div data-nums="18,21" class="ro-split-h"><!----></div><div data-nums="21,24" class="ro-split-h"><!----></div><div data-nums="24,27" class="ro-split-h"><!----></div><div data-nums="27,30" class="ro-split-h"><!----></div><div data-nums="30,33" class="ro-split-h"><!----></div><div data-nums="33,36" class="ro-split-h"><!----></div><div data-nums="0,2,3" class="ro-corner clear-before"><!----></div><div data-nums="2,3" class="ro-split-v"><!----></div><div data-nums="2,3,5,6" class="ro-corner"><!----></div><div data-nums="5,6" class="ro-split-v"><!----></div><div data-nums="5,6,8,9" class="ro-corner"><!----></div><div data-nums="8,9" class="ro-split-v"><!----></div><div data-nums="8,9,11,12" class="ro-corner"><!----></div><div data-nums="11,12" class="ro-split-v"><!----></div><div data-nums="11,12,14,15" class="ro-corner"><!----></div><div data-nums="14,15" class="ro-split-v"><!----></div><div data-nums="14,15,17,18" class="ro-corner"><!----></div><div data-nums="17,18" class="ro-split-v"><!----></div><div data-nums="17,18,20,21" class="ro-corner"><!----></div><div data-nums="20,21" class="ro-split-v"><!----></div><div data-nums="20,21,23,24" class="ro-corner"><!----></div><div data-nums="23,24" class="ro-split-v"><!----></div><div data-nums="23,24,26,27" class="ro-corner"><!----></div><div data-nums="26,27" class="ro-split-v"><!----></div><div data-nums="26,27,29,30" class="ro-corner"><!----></div><div data-nums="29,30" class="ro-split-v"><!----></div><div data-nums="29,30,32,33" class="ro-corner"><!----></div><div data-nums="32,33" class="ro-split-v"><!----></div><div data-nums="32,33,35,36" class="ro-corner"><!----></div><div data-nums="35,36" class="ro-split-v"><!----></div><div data-nums="0,2" class="ro-split-h clear-before"><!----></div><div data-nums="2,5" class="ro-split-h"><!----></div><div data-nums="5,8" class="ro-split-h"><!----></div><div data-nums="8,11" class="ro-split-h"><!----></div><div data-nums="11,14" class="ro-split-h"><!----></div><div data-nums="14,17" class="ro-split-h"><!----></div><div data-nums="17,20" class="ro-split-h"><!----></div><div data-nums="20,23" class="ro-split-h"><!----></div><div data-nums="23,26" class="ro-split-h"><!----></div><div data-nums="26,29" class="ro-split-h"><!----></div><div data-nums="29,32" class="ro-split-h"><!----></div><div data-nums="32,35" class="ro-split-h"><!----></div><div data-nums="0,1,2" class="ro-corner clear-before"><!----></div><div data-nums="1,2" class="ro-split-v"><!----></div><div data-nums="1,2,4,5" class="ro-corner"><!----></div><div data-nums="4,5" class="ro-split-v"><!----></div><div data-nums="4,5,7,8" class="ro-corner"><!----></div><div data-nums="7,8" class="ro-split-v"><!----></div><div data-nums="7,8,10,11" class="ro-corner"><!----></div><div data-nums="10,11" class="ro-split-v"><!----></div><div data-nums="10,11,13,14" class="ro-corner"><!----></div><div data-nums="13,14" class="ro-split-v"><!----></div><div data-nums="13,14,16,17" class="ro-corner"><!----></div><div data-nums="16,17" class="ro-split-v"><!----></div><div data-nums="16,17,19,20" class="ro-corner"><!----></div><div data-nums="19,20" class="ro-split-v"><!----></div><div data-nums="19,20,22,23" class="ro-corner"><!----></div><div data-nums="22,23" class="ro-split-v"><!----></div><div data-nums="22,23,25,26" class="ro-corner"><!----></div><div data-nums="25,26" class="ro-split-v"><!----></div><div data-nums="25,26,28,29" class="ro-corner"><!----></div><div data-nums="28,29" class="ro-split-v"><!----></div><div data-nums="28,29,31,32" class="ro-corner"><!----></div><div data-nums="31,32" class="ro-split-v"><!----></div><div data-nums="31,32,34,35" class="ro-corner"><!----></div><div data-nums="34,35" class="ro-split-v"><!----></div><div data-nums="0,1" class="ro-split-h clear-before"><!----></div><div data-nums="1,4" class="ro-split-h"><!----></div><div data-nums="4,7" class="ro-split-h"><!----></div><div data-nums="7,10" class="ro-split-h"><!----></div><div data-nums="10,13" class="ro-split-h"><!----></div><div data-nums="13,16" class="ro-split-h"><!----></div><div data-nums="16,19" class="ro-split-h"><!----></div><div data-nums="19,22" class="ro-split-h"><!----></div><div data-nums="22,25" class="ro-split-h"><!----></div><div data-nums="25,28" class="ro-split-h"><!----></div><div data-nums="28,31" class="ro-split-h"><!----></div><div data-nums="31,34" class="ro-split-h"><!----></div><div data-nums="0,1,2,3" class="ro-corner clear-before"><!----></div><div data-nums="1,2,3" class="ro-split-v"><!----></div><div data-nums="1,2,3,4,5,6" class="ro-corner"><!----></div><div data-nums="4,5,6" class="ro-split-v"><!----></div><div data-nums="4,5,6,7,8,9" class="ro-corner"><!----></div><div data-nums="7,8,9" class="ro-split-v"><!----></div><div data-nums="7,8,9,10,11,12" class="ro-corner"><!----></div><div data-nums="10,11,12" class="ro-split-v"><!----></div><div data-nums="10,11,12,13,14,15" class="ro-corner"><!----></div><div data-nums="13,14,15" class="ro-split-v"><!----></div><div data-nums="13,14,15,16,17,18" class="ro-corner"><!----></div><div data-nums="16,17,18" class="ro-split-v"><!----></div><div data-nums="16,17,18,19,20,21" class="ro-corner"><!----></div><div data-nums="19,20,21" class="ro-split-v"><!----></div><div data-nums="19,20,21,22,23,24" class="ro-corner"><!----></div><div data-nums="22,23,24" class="ro-split-v"><!----></div><div data-nums="22,23,24,25,26,27" class="ro-corner"><!----></div><div data-nums="25,26,27" class="ro-split-v"><!----></div><div data-nums="25,26,27,28,29,30" class="ro-corner"><!----></div><div data-nums="28,29,30" class="ro-split-v"><!----></div><div data-nums="28,29,30,31,32,33" class="ro-corner"><!----></div><div data-nums="31,32,33" class="ro-split-v"><!----></div><div data-nums="31,32,33,34,35,36" class="ro-corner"><!----></div><div data-nums="34,35,36" class="ro-split-v"><!----></div>
                      </div>
                          
                        <script type="text/javascript">
  
                                  $(document).ready(function(){

                                        $('.ro-split-v').addClass('g_numb add_bet comb_class hover_out');
                                        $('.ro-split-h').addClass('g_numb add_bet comb_class hover_out');
                                        $('.ro-corner').addClass('g_numb add_bet comb_class hover_out');
    
                                        $('body').on('mouseenter', '.comb_class', function(){  
                                                $('.table_inner .g_numb').removeClass('active_val');
                                                 var cmb_nos = $(this).data('nums');     
                                                 var cmb_no = cmb_nos.split(',');
                                                     
                                                 $('.table_inner .g_numb').each(function(index){
                                                      var text_val = $(this).text();
                                                      if(jQuery.inArray(text_val, cmb_no) !== -1 )
                                                      { 
                                                        $(this).addClass('active_val');
                                                      }
                                                 });
                                                 
                                        });

                                  });
                                  

                        </script>       
                                  
                        <div class="clearfix"></div>
                                 
                            <div class="col-md-4 first pd_com hover_out get_first_twelve add_bet">1st 12</div>
                            <div class="col-md-4 second pd_com hover_out get_second_twelve add_bet">2nd 12</div>
                            <div class="col-md-4 third pd_com hover_out get_third_twelve add_bet">3rd 12</div>
                             
                            <div class="clearfix"></div>
                                  
                            <div class="col-md-2 col_one pd_com2 hover_out get_one_eighteen add_bet">1-18</div>
                            <div class="col-md-2 col_two pd_com2 hover_out get_even add_bet" onclick="get_even();">even</div>
                            <div class="col-md-2 col_third hover_out get_black add_bet"><svg viewBox="0 0 100 60" preserveAspectRatio="none"><path d="M0,30 50,0 100,30 50,60z">Black</path></svg></div>
                            <div class="col-md-2 col_four hover_out get_red add_bet" ><svg viewBox="0 0 100 60" preserveAspectRatio="none"><path d="M0,30 50,0 100,30 50,60z">Red</path></svg></div>
                            <div class="col-md-2 col_five pd_com2 hover_out get_odd add_bet" >odd</div>
                            <div class="col-md-2 col_six pd_com2 hover_out get_nineteen_thirtysix add_bet">19-36</div>
                                 
                      </div>
                   </div>
            </div>

            <div class="container">
        
            <div class="row bet_sec">
               <div class="col-lg-4 col-md-4">
               
                    <div class="bet_amm">
                        <img class="img-responsive bett" src="http://harebet.intermining.io/public/themes/public/assets/images/bit2.png">
                        <span> Bet Amount</span>
                    </div>
                    
                    <div class="input-group bet_frm">               
                    <input type="hidden" id="payment_sign" value="BTC">    
                      <input type="text" name="bet_amount" id="bet_amount" value="0">
                      <span class="input-group-addon">HBC</span>
                    </div>
                    
                <div class="btnns">                      
                <button type="button" class="btn btn-default btn-lg var_button" data-bet="min" >Min</button>
                <button type="button" class="btn btn-default btn-lg var_button" data-bet="half">X/2</button>
                <button type="button" class="btn btn-default btn-lg var_button" data-bet="double">X*2</button>
                <button type="button" class="btn btn-default btn-lg var_button" data-bet="max">Max</button>
                </div>

               </div>
                <div class="col-lg-4 col-md-4">
                    <button class="btn btn-default btn-lg pl_bet" id="spin_btn" onclick="spin();" role="button">Place bet</button>
                      <div class="checkbox">
                        <label>
                          <input type="checkbox"> Repeat always
                        </label>
                      </div>
               </div>
 <div class="col-lg-4 col-md-4">
<div class="chips_sec">
<h3>Select Chip Value</h3>
<div class="chip blue"><span class="amount" data-val="1">1</span><span class="title">μBTC</span></div>
<div class="chip blue"><span class="amount" data-val="2">2</span><span class="title">μBTC</span></div>
<div class="chip blue"><span class="amount" data-val="5">5</span><span class="title">μBTC</span></div>
<div class="chip green"><span class="amount" data-val="10">10</span><span class="title">μBTC</span></div>
<div class="chip green"><span class="amount" data-val="20">20</span><span class="title">μBTC</span></div>
<div class="chip green"><span class="amount" data-val="50">50</span><span class="title">μBTC</span></div>
<div class="chip purple"><span class="amount" data-val="100">100</span><span class="title">mBTC</span></div>
<div class="chip purple"><span class="amount" data-val="500">500</span><span class="title">mBTC</span></div>
<div class="chip purple"><span class="amount" data-val="1000">1k</span><span class="title">mBTC</span></div>
<div class="chip orange"><span class="amount" data-val="5000">5k</span><span class="title">mBTC</span></div>
<div class="chip orange"><span class="amount" data-val="10000">10k</span><span class="title">mBTC</span></div>
<div class="chip orange"><span class="amount" data-val="25000">25k</span><span class="title">mBTC</span></div>
<div class="chip orange"><span class="amount" data-val="500000">50k</span><span class="title">mBTC</span></div>
<div class="chip red"><span class="amount" data-val="0">X</span><span class="title">BTC</span></div>
<input type="hidden" id="get_chip_amount" value="">
</div> 
</div>
            </div>
            
            </div>



            </div>
        </section>


 <section class="couterbottm">
         <div class="container">
            <div class="row">
               <div class="col-lg-12 col-md-12 col-sm-12">
                  <div class="ctabouterr">
                     <ul class="nav nav-pills cartabb">
                        @php $status = 0; @endphp
                        @if(!empty(user_id()))
                            @php $status = 1;  @endphp
                            <li class="active"><a data-toggle="pill" href="#home">My Bets </a></li>
                        @endif
                        <li class="{{ $status == 1 ? '' : 'active'}}">
                           <a data-toggle="pill" href="#menu1">
                              All Bets 
                              <div id="shiva"><span class="count">30</span>+</div>
                           </a>
                        </li>
                        <li><a data-toggle="pill" href="#menu2">Highrollers </a></li>
                     </ul>
                        <div class="tab-content">
                        @if(!empty($status))
                            <div id="home" class="tab-pane fade in active">
                           <div class="table-responsive">
                               
                              
                               <table class="table table-bordered cattableh">
                                 <thead>
                                    <tr>
                                       <th>Bet ID</th>
                                       <th>Player</th>
                                       <th>Time</th>
                                       <th>Bet</th>
                                       <th>Total Profit</th>
                                       <th>Result</th>
                                       <th>Total Received</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                    @foreach($bets as $bet)
                                     @if($bet->user_id == user_id())
                                    <tr>
                                       <td class="text-center text-underline">
                                          <a href="#">{{ $bet->id }} <i class="fas fa-share"></i></a>
                                       </td>
                                       <td><a href="">{{ !empty($bet->user_info->name) ? $bet->user_info->name : 'Deleted user by admin' }}</a></td>
                                       <td>{{ format_time($bet->created_at) }}</td>
                                       <td>{{ $bet->amount }} <img src="{{ url('themes/public/assets/images/carb.png') }}" class="cartimg">
                                         </td>  
                                       <td>{{ $bet->total_profit }}x</td>
                                       <td class="text-center">
                                          {{ $bet->strike_final_value }}
                                       </td>
                                       <td>{{ $bet->total_receive_amount }}  <img src="{{ url('themes/public/assets/images/cabittt.png') }}" class="cargame3">
                                       </td>
                                    </tr>
                                    @endif
                                    @endforeach
                                 </tbody>
                              </table>
                           </div>
                        </div>
                        @endif
                        <div id="menu1" class="tab-pane fade {{ $status == 1 ? '' : 'in active'}}">
                           <div class="table-responsive">
                              <table class="table table-bordered cattableh">
                                 <thead>
                                    <tr>
                                       <th>Bet ID</th>
                                       <th>Player</th>
                                       <th>Time</th>
                                       <th>Bet</th>
                                       <th>Total Profit</th>
                                       <th>Result</th>
                                       <th>Total Received</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                    @foreach($bets as $bet)
                                    <tr>
                                       <td class="text-center text-underline">
                                          <a href="#">{{ $bet->id }} <i class="fas fa-share"></i></a>
                                       </td>
                                       <td><a href="">{{ !empty($bet->user_info->name) ? $bet->user_info->name : 'Deleted user by admin' }}</a></td>
                                       <td>{{ format_time($bet->created_at) }}</td>
                                       <td>{{ $bet->amount }} <img src="{{ url('themes/public/assets/images/carb.png') }}" class="cartimg">
                                         </td>  
                                       <td>{{ $bet->total_profit }}x</td>
                                       <td class="text-center">
                                          {{ $bet->strike_final_value }}
                                       </td>
                                       <td>{{ $bet->total_receive_amount }}  <img src="{{ url('themes/public/assets/images/cabittt.png') }}" class="cargame3">
                                       </td>
                                    </tr>
                                    @endforeach
                                 </tbody>
                              </table>
                           </div>
                        </div>
                        <div id="menu2" class="tab-pane fade">
                           <div class="table-responsive">
                              <table class="table table-bordered cattableh">
                                 <thead>
                                    <tr>
                                       <th>Bet ID</th>
                                       <th>Player</th>
                                       <th>Time</th>
                                       <th>Bet</th>
                                       <th>Total Profit</th>
                                       <th>Result</th>
                                       <th>Total Received</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                    @foreach($bets as $bet)
                                    <tr>
                                       <td class="text-center text-underline">
                                          <a href="#">{{ $bet->id }} <i class="fas fa-share"></i></a>
                                       </td>
                                       <td><a href="">{{ !empty($bet->user_info->name) ? $bet->user_info->name : 'Deleted user by admin' }}</a></td>
                                       <td>{{ format_time($bet->created_at) }}</td>
                                       <td>{{ $bet->amount }} <img src="{{ url('themes/public/assets/images/carb.png') }}" class="cartimg">
                                         </td>  
                                       <td>{{ $bet->total_profit }}x</td>
                                       <td class="text-center">
                                          {{ $bet->strike_final_value }}
                                       </td>
                                       <td>{{ $bet->total_receive_amount }}  <img src="{{ url('themes/public/assets/images/cabittt.png') }}" class="cargame3">
                                       </td>
                                    </tr>
                                    @endforeach
                                 </tbody>
                              </table>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>



<script type="text/javascript">    
// $(document).on('click', 'button', function () {}
$('body').on('click', '.chips_sec .chip', function () {
    var chip_amount = $(this).find('.amount').data('val');
    $('#get_chip_amount').val(chip_amount);
    $('.select_chip').remove();
     chip_color_class = ($(this).attr('class')).replace('chip ', '');
});


/*$(document).on('click', '.table_inner', function () {
    $(this).addClass('bet_no');
    var bet_chip_amount = $('#get_chip_amount').val();
    var bet_amount = $('#bet_amount').val();
    var final_amount = parseInt(bet_amount) + parseInt(bet_chip_amount) 
    $('#bet_amount').val(final_amount);  

    alert(bet_amount);

});*/

$(document).on('click', '.table_inner .add_bet', function () {



    addbetobject = $(this);

    var datanum =  addbetobject.data('nums');

    if(datanum){    
    var nocounts =  datanum.split(',');
    var nocount = nocounts.length;
    addbetobject.addClass('no_comb_'+nocount);
  }


    var bet_chip_amount = $('#get_chip_amount').val(); 
    if(bet_chip_amount != ''){
    if(bet_chip_amount != 0){
            var val_on_no = $(this).attr('val_on_no');
            final_val_on_no = parseInt(bet_chip_amount) + parseInt(val_on_no);

            if(isNaN(final_val_on_no)){
                final_val_on_no = bet_chip_amount
            }

            $(this).attr('val_on_no', final_val_on_no);

            $(this).find('div').remove();

            if(final_val_on_no > 0 && final_val_on_no <= 9){
              chip_color_class = 'blue' ;
            }else if(final_val_on_no >= 10 && final_val_on_no <= 99){
              chip_color_class = 'green';
            }else if(final_val_on_no >= 100 && final_val_on_no <= 1000){
              chip_color_class = 'purple';
            }else if(final_val_on_no >= 1001 && final_val_on_no <= 50000){
               chip_color_class = 'orange';
            }else{
              
            }


            if(final_val_on_no > 0){
                var html = `<div class="pankaj `+ chip_color_class +`"><div class="amount_bet">`+ final_val_on_no +`</div><div class="title_bet">μBTC</div></div>`;
                $(this).append(html);
            }


            var bet_amount = $('#bet_amount').val();
            var final_amount = parseInt(bet_amount) + parseInt(bet_chip_amount) 
            $('#bet_amount').val(final_amount); 
            if( bet_chip_amount != '' ){
                var chip_obj = $(this);
                $(this).addClass('bet_no');
                checkbetamount();

                /*$('.chips_sec .chip').each(function(index){
                    var chip_class = ($(this).attr('class')).replace('chip ', '');
                    var chip_val = $(this).find('span.amount').data('val');

                    if(chip_class != 'red'){
                        if(chip_val <= final_val_on_no){
                            var add_bet_class = (addbetobject.attr('class')).split(' ');
                            var color = ['green', 'blue', 'purple', 'orange'];
                            for(var d = 0; d < color.length; d++){
                                if($.inArray(color[d], add_bet_class) !== -1){
                                    chip_obj.removeClass(color[d]);      
                                }
                            }

                            //chip_obj.addClass(chip_class);
                        }
                    }
                });*/
            }
    }else{
        $(this).removeClass('bet_no');
        $(this).find('div').remove();
        var add_bet_class = ($(this).attr('class')).split(' ');
        var color = ['green', 'blue', 'purple', 'orange'];
        for(var d = 0; d < color.length; d++){
            if($.inArray(color[d], add_bet_class) !== -1){
                $(this).removeClass(color[d]);      
            }
        }
    }
    }  
    else{

        $('.select_chip').remove();
        $( ".table_inner" ).after( "<p class='select_chip'> Please Select chip First </p>" );
    }  
    
});

comb_type = { no_comb_2 : 17, no_comb_3 : 11, no_comb_4 : 8, no_comb_6 : 5};

$('body').on('contextmenu','.table_inner .bet_no', function() {

//$('body '.table_inner').contextmenu(function() {
$(this).removeClass('bet_no');

$(this).find('div').remove();
var add_bet_class = ($(this).attr('class')).split(' ');

Object.keys(comb_type);
var comb_type_class = Object.keys(comb_type);

for(var i =0; i<comb_type_class.length; i++){
  if($.inArray(comb_type_class[i], add_bet_class) !== -1){
          $(this).removeClass(comb_type_class[i]);      
      }
}

var color = ['green', 'blue', 'purple', 'orange'];
for(var d = 0; d < color.length; d++){
    if($.inArray(color[d], add_bet_class) !== -1){
        $(this).removeClass(color[d]);      
    }
}

var bet_chip_amount = $(this).attr('val_on_no');
var bet_amount = $('#bet_amount').val();
var final_amount = bet_amount - bet_chip_amount;
$('#bet_amount').val(final_amount);
$(this).attr('val_on_no',0);

//alert(final_amount);

});


  $(document).on('click', '.var_button', function () {
                var bet_amount = $('#bet_amount').val();
                var data = $(this).data('bet');
                if (data == 'min')
                {
                    bet_amount = 1;                    
                    $('#bet_amount').val(bet_amount);
                }
                else if (data == 'half')
                {
                    bet_amount = bet_amount / 2;
                    $('#bet_amount').val(bet_amount);
                }
                else if (data == 'double')
                {
                    bet_amount = bet_amount * 2;                    
                    $('#bet_amount').val(bet_amount);
                }
                else if (data == 'max')
                {
                    bet_amount = 9900;
                    $('#bet_amount').val(bet_amount);
                    
                }
                
            });




    $('.get_first_row').mouseenter(function(){   
    $('.table_inner .g_numb').removeClass('active_val');
    $(this).addClass('active_val');
   var first_row_array = [];
   $('.first_row .g_numb').each(function(index){
        first_row_array.push($(this).text());
         $(this).addClass('active_val');
   });
   var first_row__val = first_row_array.toString();   
  // alert(first_row__val);
   });

    $('.get_second_row').mouseenter(function(){   
    $('.table_inner .g_numb').removeClass('active_val');
    $(this).addClass('active_val');
   var second_row_array = [];
   $('.second_row .g_numb').each(function(index){
        second_row_array.push($(this).text());
         $(this).addClass('active_val');
   });
   var second_row__val = second_row_array.toString();   
  // alert(second_row__val);
   });

   $('.get_third_row').mouseenter(function(){   
    $('.table_inner .g_numb').removeClass('active_val');
    $(this).addClass('active_val');
   var third_row_array = [];
   $('.third_row .g_numb').each(function(index){
        third_row_array.push($(this).text());
         $(this).addClass('active_val');
   });
   var third_row__val = third_row_array.toString();   
   //alert(third_row__val);
   }); 


   $('.get_first_twelve').mouseenter(function(){   
    $('.table_inner .g_numb').removeClass('active_val');
    $(this).addClass('active_val');
   var first_twelve_array = [];
   $('.table_inner .g_numb').each(function(index){
        var text_val = $(this).text();        
        if(text_val >= 1 && text_val <= 12)
        {
        first_twelve_array.push($(this).text());
        $(this).addClass('active_val');
        }
   });
   var first_twelve_val = first_twelve_array.toString();
  // alert(first_twelve_val);
   
   });

   $('.get_second_twelve').mouseenter(function(){   
    $('.table_inner .g_numb').removeClass('active_val');
    $(this).addClass('active_val');
   var second_twelve_array = [];
   $('.table_inner .g_numb').each(function(index){
        var text_val = $(this).text();        
        if(text_val >= 13 && text_val <= 24)
        {
        second_twelve_array.push($(this).text());
        $(this).addClass('active_val');
        }
   });
   var second_twelve_val = second_twelve_array.toString();
  // alert(second_twelve_val);
   
   });

   $('.get_third_twelve').mouseenter(function(){   
    $('.table_inner .g_numb').removeClass('active_val');
    $(this).addClass('active_val');
   var third_twelve_array = [];
   $('.table_inner .g_numb').each(function(index){
        var text_val = $(this).text();        
        if(text_val >= 25 && text_val <= 36)
        {
        third_twelve_array.push($(this).text());
        $(this).addClass('active_val');
        }
   });
   var third_twelve_val = third_twelve_array.toString();
 // alert(third_twelve_val);
  
   });




   $('.get_red').mouseenter(function(){
       $(this).addClass('active_val');
    $('.table_inner .g_numb').removeClass('active_val');
   var red_array = [];
   $('.table_inner .t_red').each(function(index){
        red_array.push($(this).text());
         $(this).addClass('active_val');
   });
   var red_val = red_array.toString(); 
  // alert(red_val)  ;
   });

   $('.get_black').mouseenter(function(){
    $('.table_inner .g_numb').removeClass('active_val');
    $(this).addClass('active_val');
   var black_array = [];
   $('.table_inner .t_black').each(function(index){
        black_array.push($(this).text());
        $(this).addClass('active_val');
   });
   var black_val = black_array.toString();
  // alert(black_val);
   
   });

   $('.get_even').mouseenter(function(){
   //function get_even(){
    // debugger;
    $('.table_inner .g_numb').removeClass('active_val');
    $(this).addClass('active_val');
   var even_array = [];
   $('.table_inner .g_numb').each(function(index){
        var text_val = $(this).text();
        
        if(text_val %2 == 0 && text_val != 0)
        {
        even_array.push($(this).text());
        $(this).addClass('active_val');
        }

   });
   var even_val = even_array.toString();
    //   alert(even_val);
  });


$('.get_odd').mouseenter(function(){
   //function get_odd(){
    // debugger;
    $(this).addClass('active_val');
    $('.table_inner .g_numb').removeClass('active_val');
   var odd_array = [];
   $('.table_inner .g_numb').each(function(index){
        var text_val = $(this).text();
        
        if(text_val %2 == 1)
        {
        odd_array.push($(this).text());
        $(this).addClass('active_val');
        }

   });
   var odd_val = odd_array.toString();
   
   // alert(odd_val);
   });

   
$('.get_one_eighteen').mouseenter(function(){
   //function get_one_eighteen(){
    // debugger;
    $('.table_inner .g_numb').removeClass('active_val');
    $(this).addClass('active_val');
   var one_eighteen_array = [];
   $('.table_inner .g_numb').each(function(index){
        var text_val = $(this).text();        
        if(text_val >= 1 && text_val <= 18)
        {
        one_eighteen_array.push($(this).text());
        $(this).addClass('active_val');
        }
   });
   var one_eighteen_val = one_eighteen_array.toString();
   
    //alert(one_eighteen_val);
   });


   $('.get_nineteen_thirtysix').mouseenter(function(){
   //function get_nineteen_thirtysix(){
    // debugger;
    $(this).addClass('active_val');
    $('.table_inner .g_numb').removeClass('active_val');
   var nineteen_thirtysix_array = [];
   $('.table_inner .g_numb').each(function(index){
        var text_val = $(this).text();
        
        if(text_val >= 19 && text_val <= 36  )
        {
        nineteen_thirtysix_array.push($(this).text());
        $(this).addClass('active_val');
        }

   });
   var nineteen_thirtysix_val = nineteen_thirtysix_array.toString();   
   // alert(nineteen_thirtysix_val);
   });

   $('body').on('mouseout', '.hover_out', function(){
        $(this).removeClass('active_val');
        $('.table_inner .g_numb').removeClass('active_val');
   
   });


$(document).ready(function(){
    $('#bet_amount').attr('disabled', 'disabled');
    $('#spin_btn').attr('disabled', 'disabled');

      $('body').on('click', '.table_inner .bet_no', function(){        
        $( ".bet_frm" ).after( "<p class='amout_low'>low amount 1</p>" );
        checkbetamount();
     });
 });

function checkbetamount(){
   var betamount =  $('#bet_amount').val();
   if(betamount >= 2){
    $('#spin_btn').removeAttr('disabled', 'disabled');    
    $('.amout_low').hide(); 
   }
}

</script>


<script type="text/javascript">

var colors = ["#252525", "#c40f00","#252525", "#c40f00","#252525", "#c40f00","#252525", "#c40f00","#252525", "#c40f00","#252525", "#c40f00","#252525", "#c40f00","#252525", "#c40f00","#252525", "#c40f00","#252525", "#c40f00","#252525", "#c40f00","#252525", "#c40f00","#252525", "#c40f00","#252525", "#c40f00","#252525", "#c40f00","#252525", "#c40f00","#252525", "#c40f00","#252525", "#c40f00","#39b54a"];
var restaraunts = [30,22,18,29,7,26,32,15,28,4,21,11,25,17,34,7,16,13,3,8,20,9,1,23,35,25,5,27,19,3,36,31,6,33,14,24,0];

var startAngle = 0;
var arc = Math.PI / 18.5;

var spinTimeout = null;
var spinArcStart = 10;
var spinTime = 0;
var spinTimeTotal = 0;

var ctx;
   
function drawRouletteWheel() {
  var canvas = document.getElementById("canvas");
  if (canvas.getContext) {
    var outsideRadius = 200;
    var textRadius = 160;
    var insideRadius = 125;
   
    ctx = canvas.getContext("2d");
    ctx.clearRect(0,0,500,500);
   
   
    ctx.strokeStyle = "black";
    ctx.lineWidth = 2;
   
    ctx.font = 'bold 18px Helvetica, Arial';
   
    for(var i = 0; i < 37; i++) {
      var angle = startAngle + i * arc;
      ctx.fillStyle = colors[i];
     
      ctx.beginPath();
      ctx.arc(250, 250, outsideRadius, angle, angle + arc, false);
      ctx.arc(250, 250, insideRadius, angle + arc, angle, true);
      ctx.stroke();
      ctx.fill();
     
      ctx.save();
      ctx.shadowOffsetX = -1;
      ctx.shadowOffsetY = -1;
      ctx.shadowBlur    = 0;
      ctx.shadowColor   = "rgb(220,220,220)";
      ctx.fillStyle = "white";
      ctx.translate(250 + Math.cos(angle + arc / 2) * textRadius,
                    250 + Math.sin(angle + arc / 2) * textRadius);
      ctx.rotate(angle + arc / 2 + Math.PI / 2);
      var text = restaraunts[i];
      ctx.fillText(text, -ctx.measureText(text).width / 2, 0);
      ctx.restore();

    }
   
    //Arrow
    ctx.fillStyle = "#fff";
    ctx.beginPath();
    /*ctx.moveTo(250 - 4, 250 - (outsideRadius + 5));
    ctx.lineTo(250 + 4, 250 - (outsideRadius + 5));
    ctx.lineTo(250 + 4, 250 - (outsideRadius - 5));
    ctx.lineTo(250 + 9, 250 - (outsideRadius - 5));
    ctx.lineTo(250 + 0, 250 - (outsideRadius - 13));
    ctx.lineTo(250 - 9, 250 - (outsideRadius - 5));
    ctx.lineTo(250 - 4, 250 - (outsideRadius - 5));
    ctx.lineTo(250 - 4, 250 - (outsideRadius + 5));
    ctx.fill();*/
    ctx.arc(380, 240, 8, 0, 2 * Math.PI);
    ctx.fill();
  }
}
   
function spin() {
   /* if('{{ user_id() }}' == ''){
        alert('First you login and then you will perform bet.');
        return false;
    }
    
    if(parseFloat('{{ get_user_balance(user_id())["total_withdraw_balance"] }}') < $('#bet_amount').val()){
        alert('Amount is higher than balance.');
        return false;
    }*/
    
  spinAngleStart = Math.random() * 10 + 10;
  spinTime = 0;
  spinTimeTotal = Math.random() * 3 + 4 * 1000;  
  rotateWheel();
   
}

function rotateWheel() {
  spinTime += 30;
  if(spinTime >= spinTimeTotal) {
    stopRotateWheel();
    return;
  }
  var spinAngle = spinAngleStart - easeOut(spinTime, 0, spinAngleStart, spinTimeTotal);
  startAngle += (spinAngle * Math.PI / 180);
  drawRouletteWheel();
  spinTimeout = setTimeout('rotateWheel()', 30);
}

function stopRotateWheel() {
  clearTimeout(spinTimeout);
  
  //var degrees = startAngle * 180 / Math.PI +90 ;
  var degrees = startAngle * 180 / Math.PI +5;
  var arcd = arc * 180 / Math.PI;
  var index = Math.floor((360 - degrees % 360) / arcd);

  ctx.save();
  ctx.font = 'bold 30px Helvetica, Arial';
  var text = restaraunts[index];

 
  ctx.fillText(text, 250 - ctx.measureText(text).width / 2, 250 + 10);
  ctx.restore();

    var bet_amount = $('#bet_amount').val();
    var betno_array = [];
     var comb2_array = [];
    var new_arr = [];

var com_profit =0;      

    

    $('.table_inner .bet_no').each(function(){
        var bet_classes = ($(this).attr('class')).split(' ');
        var com_no_bet_amt = $(this).attr('val_on_no');
        for(var t = 0; t < bet_classes.length; t++){
            if(bet_classes[t] !=  ''){
                for(var i = 0; i < Object.keys(comb_type).length; i++) {
                    if(Object.keys(comb_type)[i] === bet_classes[t]){ 
                        var data_nums = ($(this).data('nums')).split(',');
                        debugger;
                        if($.inArray(text.toString(), data_nums) !== -1){
                          com_profit += com_no_bet_amt * comb_type[Object.keys(comb_type)[i]]; 
                        }
                      }
                    }
                }
            }
        


        var num_amount = $(this).attr('val_on_no');
        new_arr.push({[$(this).contents().get(0).nodeValue]: num_amount});
        betno_array.push($(this).contents().get(0).nodeValue);
    });

        //alert(com_profit);
        var betno_val = betno_array.toString();
        //alert(betno_val);

        var even_array = [6,12,18,24,30,36,2,8,14,20,26,32,4,10,16,22,28,34];
        var odd_array = [3,9,15,21,27,33,5,11,17,23,29,35,1,7,13,19,25,31];
        var red_array = [3,9,12,18,21,27,30,36,5,14,23,32,1,7,16,19,25,34];
        var black_array = [6,15,24,33,2,8,11,17,20,26,29,35,4,10,13,22,28,31];
        var first_12 = [3,6,9,12,2,5,8,11,1,4,7,10];
        var second_12 = [15,18,21,24,14,17,20,23,13,16,19,22];        
        var third_12 = [27,30,33,36,26,29,32,35,25,28,31,34];
        var first_18 = [3,6,9,12,15,18,2,5,8,11,14,17,1,4,7,10,13,16];
        var second_18 = [21,24,27,30,33,36,20,23,26,29,32,35,19,22,25,28,31,34];
        var first_row = [3,6,9,12,15,18,21,24,27,30,33,36];
        var second_row = [2,5,8,11,14,17,20,23,26,29,32,35];
        var third_row = [1,4,7,10,13,16,19,22,25,28,31,34];

        var total_profit = 0;

        total_profit = total_profit + com_profit;
        
        //1st 12,2nd 12,3rd 12,1-18,even,odd,19-36
        var bet_nos_array =[];        
        var betno_val = betno_val.split(',');

        if(jQuery.inArray("even", betno_val) !== -1){
            
            $.merge(bet_nos_array, even_array);
            if($.inArray(text, even_array) !== -1){
               var bet_amount_on_even = $('.get_even').attr('val_on_no');
                total_profit += bet_amount_on_even;    
            }
            betno_val.splice(betno_val.indexOf("even"), 1);
        }

        if(jQuery.inArray("odd", betno_val) !== -1){
            
            $.merge(bet_nos_array, odd_array);
            if($.inArray(text, odd_array) !== -1){
            var bet_amount_on_odd = $('.get_odd').attr('val_on_no');
                total_profit += bet_amount_on_odd;    
            }
            betno_val.splice(betno_val.indexOf("odd"), 1);
        }

        if(jQuery.inArray("19-36", betno_val) !== -1){
           
            $.merge(bet_nos_array, second_18);
            if($.inArray(text, second_18) !== -1){
               var bet_amount_on_n_t = $('.get_nineteen_thirtysix').attr('val_on_no');
                total_profit += bet_amount_on_n_t;   
            }
            betno_val.splice(betno_val.indexOf("19-36"), 1);
        }

        if(jQuery.inArray("1-18", betno_val) !== -1){
            
            $.merge(bet_nos_array, first_18);
            if($.inArray(text, first_18) !== -1){
              var bet_amount_on_o_e = $('.get_one_eighteen').attr('val_on_no');
                total_profit += bet_amount_on_o_e;  
            }
            betno_val.splice(betno_val.indexOf("1-18"), 1);
        }

        if(jQuery.inArray("Red", betno_val) !== -1){
            
            $.merge(bet_nos_array, red_array);
            if($.inArray(text, red_array) !== -1){
              var  bet_amount_on_red = $('.get_red').attr('val_on_no');
                total_profit += bet_amount_on_red;  
            }
            betno_val.splice(betno_val.indexOf("Red"), 1);
        }

        if(jQuery.inArray("Black", betno_val) !== -1){
            
            $.merge(bet_nos_array, black_array);
            if($.inArray(text, black_array) !== -1){
             var  bet_amount_on_black = $('.get_black').attr('val_on_no');
                total_profit += bet_amount_on_black;  
            }
            betno_val.splice(betno_val.indexOf("Black"), 1);
        }

/************************/

        if(jQuery.inArray("1:3", betno_val) !== -1){
            $.merge(bet_nos_array, third_row);
            if($.inArray(text, third_row) !== -1){
             var  bet_amount_on_tird_row = $('.get_third_row').attr('val_on_no');               
                total_profit += bet_amount_on_tird_row * 2;     
            }
            betno_val.splice(betno_val.indexOf("1:3"), 1);
        }

        if(jQuery.inArray("1:2", betno_val) !== -1){
            //alert(betno_val);
            $.merge(bet_nos_array, second_row);
            if($.inArray(text, second_row) !== -1){
              var  bet_amount_on_sec_row = $('.get_second_row').attr('val_on_no');                
                total_profit += bet_amount_on_sec_row * 2;               
            }
            betno_val.splice(betno_val.indexOf("1:2"), 1);
        }

        if(jQuery.inArray("1:1", betno_val) !== -1){
            $.merge(bet_nos_array, first_row);
            if($.inArray(text, first_row) !== -1){
             var  bet_amount_on_f_row = $('.get_first_row').attr('val_on_no');             
                total_profit += bet_amount_on_f_row * 2;             ;
            }

            betno_val.splice(betno_val.indexOf("1:1"), 1);
        }


        if(jQuery.inArray("1st 12", betno_val) !== -1){
            $.merge(bet_nos_array, first_12);
            if($.inArray(text, first_12) !== -1){
              var  bet_amount_on_f_tw = $('.get_first_twelve').attr('val_on_no'); 
                total_profit += bet_amount_on_f_tw * 2;    
            }

            betno_val.splice(betno_val.indexOf("1st 12"), 1);
        }

        if(jQuery.inArray("2nd 12", betno_val) !== -1){
            $.merge(bet_nos_array, second_12);
            if($.inArray(text, second_12) !== -1){
               var bet_amount_on_s_tw = $('.get_second_twelve').attr('val_on_no'); 
                total_profit += bet_amount_on_s_tw * 2;   
            }
            betno_val.splice(betno_val.indexOf("2nd 12"), 1);
        }

        if(jQuery.inArray("3rd 12", betno_val) !== -1){
            $.merge(bet_nos_array, third_12);
            if($.inArray(text, third_12) !== -1){
             var bet_amount_on_t_tw = $('.get_third_twelve').attr('val_on_no'); 
                total_profit += bet_amount_on_t_tw * 2; 
            }
            betno_val.splice(betno_val.indexOf("3rd 12"), 1);
        }

/**************************************/

        for(var t = 0; t < betno_val.length; t++){
            if(betno_val[t] !=  ''){
                for(var i = 0; i < new_arr.length; i++) {
                    if(Object.keys(new_arr[i]).toString() === betno_val[t])
                    {  if(betno_val[t] == text)
                        total_profit += new_arr[i][Object.keys(new_arr[i])] * 36; 
                        // $.merge(bet_nos_array, [betno_val[t]]);
                        // betno_val.splice(betno_val[t], 1);
                      }
                }
            }
        }


      var final_bet_amt = $('#bet_amount').val();

    var bet_id = 0;
      if(total_profit != 0){
        $('.table_inner').find('.bet_no').removeAttr('val_on_no');
        $('.table_inner').find('.bet_no div').remove();
        var add_bet_class = ($('.table_inner').find('.bet_no').attr('class')).split(' ');
        var color = ['green', 'blue', 'purple', 'orange'];
        for(var d = 0; d < color.length; d++){
            if($.inArray(color[d], add_bet_class) !== -1){
                $('.table_inner').find('.bet_no').removeClass(color[d]);      
            }
        }
        
        $('.table_inner').find('.bet_no').removeClass('bet_no');
        
        $('#spin_btn').attr('disabled', 'disabled');
        var final_bet_amt = $('#bet_amount').val();

        var total_profit = parseFloat(total_profit) - parseFloat(final_bet_amt); 
        var total_receive_amount = parseFloat(total_profit) + parseFloat(final_bet_amt); 
        bet_id = setParameters(1, text, final_bet_amt, total_profit, total_receive_amount);
        var status = 5;
        $('#bet_amount').val(0);
        swal("You Win!", "", "success");
      }else{
        $('.table_inner').find('.bet_no').removeAttr('val_on_no');
        $('.table_inner').find('.bet_no div').remove();
        var add_bet_class = ($('.table_inner').find('.bet_no').attr('class')).split(' ');
        var color = ['green', 'blue', 'purple', 'orange'];
        for(var d = 0; d < color.length; d++){
            if($.inArray(color[d], add_bet_class) !== -1){
                $('.table_inner').find('.bet_no').removeClass(color[d]);      
            }
        }
        
        $('.table_inner').find('.bet_no').removeClass('bet_no');
        
        
        
        $('#spin_btn').attr('disabled', 'disabled');
        

        var final_bet_amt = $('#bet_amount').val();
        bet_id = setParameters(0, text, final_bet_amt, 0, -final_bet_amt);
        var status = 2;
        $('#bet_amount').val(0);
        swal("You Lose!", "", "error");
      }
     
     // alert(bet_nos_array);
     $('#show_bet').prepend(`<div class="rouletext` + status + `"><h5 type="button" data-id="`+ bet_id +`" class="bet_details">
                                   `+text+`
                                 </h5></div>&nbsp;`);


  
}

function easeOut(t, b, c, d) {
  var ts = (t/=d)*t;
  var tc = ts*t;
  return b+c*(tc + -3*ts + 3*t);
}
drawRouletteWheel();


function setParameters(status, strike_final_value, final_bet_amt, total_profit, total_receive_amount){
  if(strike_final_value && final_bet_amt){
    var params = {
        payment_sign : $('#payment_sign').val(),
        amount : final_bet_amt,
        game_type : 'roulette',
        strike_final_value : strike_final_value,
    };
    
    var bet_id;
    if(status > 0){
        
        var obj2 = {
            gt_amounts : null,
            gt_profits : null,
            payout : 0,
            total_profit : total_profit,
            total_receive_amount : total_receive_amount,
        };

        $.extend(params, obj2);
        bet_id = create_bet(params);
    }else{
        var obj2 = {
            gt_amounts : null,
            gt_profits : null,
            payout : 0,
            total_profit : total_profit,
            total_receive_amount : total_receive_amount,
        };
        
        $.extend(params, obj2);
       bet_id = create_bet(params);
    }
    return bet_id;
  }
}


function create_bet(params) {
    var bet_id;
        $.ajax({
            url: "{{url('client/create_bet')}}",
            type: 'POST',
            data: params,
            success: function (data, textStatus, jqXHR)
            {
                bet_id = data;
               // debugger;
            },
            async : false
        });
        return bet_id;
    }
 
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

</script>




<style type="text/css">
    
.active_val{
    background: rgba(251, 212, 0, 0.4) !important;
    cursor: pointer;
    }

.rout_sec {
    margin-top: 0 !important;
}

/* Rout Section */
.rout_sec {
    background: #09072f url(../images/whbg.jpg) no-repeat;
    background-size: cover;
    margin-bottom: 20px;
    height: auto;
    padding:  0 0;

}
.wheell img {
    margin: 0 auto;
}
.game-box-wrapper {
    height: 70px;
    max-width: 525px;
    width: 100%;
    border: 2px solid #645b90;
    border-radius: 4px;
    padding: 0px;
    margin: 30px auto;
}
.game-box-wrapper h3 {
    background: rgb(40, 28, 98);
    border-radius: 0;
    color: #fff;
    font-size: 15px;
    font-weight: 700;
    padding: 7px;
    margin: 0 0 3px;
    text-transform: uppercase;
    text-align: center;
}

.table_inner {
    display: block;
}


.pd_com {
   width: 30.3%;
}
.pd_com2 {
   width: 14.4%;
    padding: 17.3px 11px;
}
.ro-corner.clear-before {
   margin-left: 3.8%;
}


.t_green {
    border: 2px solid #d4d4d4;
    border-radius: 20px 0 0 20px;
    height: 165px;
    color: #fff;
    text-align: center;
    display: table-cell;
    vertical-align: middle;
    padding: 0 20px;
    position: relative;
    z-index: 1;
}
.t_green:before {
    position: absolute;
    background: #39b54a;
    border-radius: 50%;
    content: "";
    color: #fff;
    z-index: -1;
    padding: 17px;
    top: calc(50% - 19px);
    left: calc(50% - 18px);
}


.t_red:before {
    position: absolute;
    background: #c40f00;
    border-radius: 50%;
    content: "";
    color: #fff;
    z-index: -1;
    padding: 18px;
    text-align: center;
    left: calc(50% - 18px);
    width: 36px;
    height: 36px;
    top: calc(50% - 19px);
}
.t_black {
    border: 2px solid #d4d4d4;
    color: #fff;
    text-align: center;
    display: inline-block;
    vertical-align: middle;
    padding: 15px 20px;
    position: relative;
    z-index: 1;
    width: 7%;
}
.t_black:before {
    position: absolute;
    background: #201e1e;
    border-radius: 50%;
    content: "";
    color: #fff;
    z-index: -1;
    padding: 18px;
    text-align: center;
    left: calc(50% - 18px);
    width: 36px;
    height: 36px;
    top: calc(50% - 19px);
}
.table_inner .t_red, .table_inner .t_black {
    float: left;
}
.ratio {
    border: 2px solid #d4d4d4;
    color: #fff;
    text-align: center;
    display: inline-block;
    vertical-align: middle;
    padding: 15px 20px;
    position: relative;
    z-index: 1;
    width: 7%;
}

.t_red {
    border: 2px solid #d4d4d4;
    color: #fff;
    text-align: center;
    display: inline-block;
    vertical-align: middle;
    padding: 15px 20px;
    position: relative;
    z-index: 1;
    width: 7%;
}
.t_red:hover{
    background:rgba(251, 212, 0, 0.4);
    cursor:pointer;
}
.t_black:hover{
    background:rgba(251, 212, 0, 0.4);
    cursor:pointer;
}
.first:hover{
    background:#000;
    cursor:pointer;
}
.second:hover{
    background:#000;
    cursor:pointer;
}
.third:hover{
    background:#000;
    cursor:pointer;
}
.col_one:hover{
    background:#000;
    cursor:pointer;
}
.col_two:hover{
    background:#000;
    cursor:pointer;
}
.col_third:hover{
    background:#000;
    cursor:pointer;
}
.col_four:hover{
    background:#000;
    cursor:pointer;
}
.col_five:hover{
    background:#000;
    cursor:pointer;
}
.col_six:hover{
    background:#000;
    cursor:pointer;
}

.pd_com {
    border: 2px solid #d4d4d4;
    color: #fff;
    text-align: center;
    display: inline-block;
    vertical-align: middle;
    padding: 15px 10px;
    position: relative;
    z-index: 1;
}
.pd_com2 {
    border: 2px solid #d4d4d4;
    color: #fff;
    text-align: center;
    display: inline-block;
    vertical-align: middle;
    padding: 15px 11px;
    position: relative;
    z-index: 1;
}

.col_third {
    border: 2px solid #d4d4d4;
    color: #fff;
    text-align: center;
    display: inline-block;
    vertical-align: middle;
    padding: 15px 11px;
    position: relative;
    z-index: 1;
}
.col_four {
    border: 2px solid #d4d4d4;
    color: #fff;
    text-align: center;
    display: inline-block;
    vertical-align: middle;
    padding: 15px 11px;
    position: relative;
    z-index: 1;
}
.shpp{
      width: 0;
      height: 0;
      border: 50px solid transparent;
      border-bottom-color: red;
      position: relative;
      top: -50px;
}
 .shpp:after {
      content: '';
      position: absolute;
      left: -50px;
      top: 50px;
      width: 0;
      height: 0;
      border: 50px solid transparent;
      border-top-color: red;
}
.col_third svg {
    width: 48%;
}
.col_third {
    border: 2px solid #d4d4d4;
    color: #fff;
    text-align: center;
    display: inline-block;
    vertical-align: middle;
    padding: 5px 11px;
    position: relative;
    z-index: 1;
}  
.col_four svg {
    width: 48%;
    fill: #c40f00;
}
.col_four {
    border: 2px solid #d4d4d4;
    color: #fff;
    text-align: center;
    display: inline-block;
    vertical-align: middle;
    padding: 5px 11px;
    position: relative;
    z-index: 1;
}  

.bet_sec {
    background: rgba(0,0,0,.2);
    border-radius: 6px;
    padding: 20px 0;
    position: relative;
    top: -90px;
    z-index: 9999;
}
.bett {
    float: left;
    height: 1.4em;
    margin: 0 5px 0 0;
}
.bet_amm span {
    color: #fff;
    font-weight: bold;
}
.bet_amm {
    margin-bottom: 10px;
}
.bet_frm input {
    background: rgba(255, 255, 255, 0.9);
    border: 1px solid transparent;
    -webkit-box-shadow: none;
    box-shadow: none;
    color: #000;
    width: 100%;
    padding: 10px;
}
.input-group-addon {
    color: #fff;
    text-align: center;
    background: rgba(0,0,0,.5);
    border: 1px solid transparent;
    border-radius: 4px;
}
.btnns {
    margin-top: 20px;
}
.btnns a {
    background: rgba(0,0,0,.5);
    color: #fff;
    padding: 10px 45px;
    border: none;
    font-size: 13px;
    text-transform: uppercase;
    font-weight: bold;
}
.pl_bet {
    width: 100%;
    border-radius: 50px;
    background: #ffcd28;
    color: #fff;
    text-transform: uppercase;
    font-weight: bold;
    margin-top: 30px;
}
.checkbox label {
    color: #fff;
}
.checkbox, .radio {
    margin-top: 15px;
}
.chip.blue {
    background-image: url(http://harebet.intermining.io/public/themes/public/assets//images/blue.png);
}
.chip.green {
    background-image: url(http://harebet.intermining.io/public/themes/public/assets//images/gree.png);
}
.chip.purple {
    background-image: url(http://harebet.intermining.io/public/themes/public/assets//images/purp.png);
}
.chip.orange {
    background-image: url(http://harebet.intermining.io/public/themes/public/assets//images/org.png);
}
.chip.red {
    background-image: url(http://harebet.intermining.io/public/themes/public/assets//images/redd.png);
}
.chip.gray {
    background-image: url(http://harebet.intermining.io/public/themes/public/assets//images/grey.png);
}
.chips_sec .chip {
    cursor: pointer;
    margin: 4px;
    -webkit-transition: all .2s ease;
    transition: all .2s ease;
}
.chips_sec h3 {
    font-size: 18px;
    font-weight: 700;
    color: #fff;
    margin: 0;
}
.chips_sec .chip:hover {
    -webkit-transform: scale(1.3);
    transform: scale(1.3);
    z-index: 90;
}
.chip {
    background-size: contain;
    color: #000;
    float: left;
    font-size: 12px;
    font-weight: 700;
    line-height: 9px;
    height: 40px;
    text-align: center;
    padding: 10px 0 0;
    width: 40px;
}
.chip span.title {
    clear: both;
    float: right;
    font-size: 8px;
    text-align: center;
    width: 40px;
}

.bet_frm span.input-group-addon {
    background: #281c62;
}
.wheell #canvas {
    position: relative;
    left: -235px;
}


.green {
    background-image: url(http://harebet.intermining.io/public/themes/public/assets//images/gree.png) !important;
}

.blue {
    background-image: url(http://harebet.intermining.io/public/themes/public/assets//images/blue.png) !important;
}

.blue {
    background-image: url(http://harebet.intermining.io/public/themes/public/assets//images/blue.png) !important;
}

.purple {
    background-image: url(http://harebet.intermining.io/public/themes/public/assets//images/purp.png) !important;
}
.orange {
    background-image: url(http://harebet.intermining.io/public/themes/public/assets//images/org.png) !important;
}
.wheell {
    position: relative;
    height: 460px;
    top: -100px;
}
.whel_img {
    position: absolute;
    top: 25%;
    left: -55%;
    transform: rotate(-5deg);
}
.wheell #canvas {
  position: relative;
  left: -270px;
}
.split { background: rgba(255, 157, 157, 0.6); margin-left: 4%; border-radius: 3px; position: absolute; pointer-events: all; z-index: 99; }
</style>
