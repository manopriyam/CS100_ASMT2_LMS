<head>
<style>
    .wrapper {
        display: flex;
        justify-content: center;
    }

    .circle {
        height: 100px;
        width: 100px;
        background-color: #EBB02D;
        border: 20px;
        border-radius: 100px;
        top: 35px;
        position: relative;
    }

    .circlein {
        height: 85px;
        width: 85px;
        background-color: #FFFFFF;
        border-radius: 90px;
        top: 5%;
        left: 5%;
        position: absolute;
    }

    @keyframes blink{
        from {left: 10px;}
        to {left: 50px;}
    }

    .eye {
        height: 30px;
        width: 30px;
        background-color: #617A55;
        border-radius: 30px;
        top: 10%;
        left: 10%;
        position: absolute;
        animation-name: blink;
        animation-duration: 2s;
        animation-iteration-count: infinite;
        animation-direction: alternate;
    }

    .wrapper {
        font-size: 150px;
        font-weight: bold;
        font-family: "Ink Free"
    }

    #div1{
        color: #83BD75;
    }
    #div2{
        color: #FF6D60;
    }
    #div3{
        color: #5FD068;
    }
    #div4{
        color: #E5890A;
    }
    #div5{
        color: #4CACBC;
    }
    #div6{
        color: #F97B22;
    }
</style>

<div class="wrapper" style='padding-top: 3%'>
    <div id="div1">B</div>
    <div class="circle">
        <div class="circlein"><div class="eye">
            </div>
        </div>
    </div>
    <div class="circle">
        <div class="circlein">
            <div class="eye"></div>
        </div>
    </div>
    <div id="div2">K</div>
    <div id="div3">W</div>
    <div id="div4">O</div>
    <div id="div5">R</div>
    <div id="div6">M</div>
</div>
</head>
