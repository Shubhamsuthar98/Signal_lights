<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signal Light</title>
    <style>
        body {
            align-items: center;
            margin-top: 50px;
        }

        .signal-lights {
            display: flex;
            align-items: center;   
        }

        .signal {
            text-align: center;
            margin: 0 10px;
        }

        .signal span { 
            display: block;
            width: 50px;
            height: 50px;
            background-color: red;
            margin-bottom: 5px;
        }


    </style>

    <script src="https://code.jquery.com/jquery-3.7.1.js" ></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" ></script>
    
</head>
<body>
    <div class="signal-lights">
        <div class="signal" id="signal_1">
            <span></span>
            <div>A</div>
        </div>

        <div class="signal" id="signal_2">
            <span></span>
            <div>B</div>
        </div>

        <div class="signal" id="signal_3">
            <span></span>
            <div>C</div>
        </div>

        <div class="signal" id="signal_4">
            <span></span>
            <div>D</div>
        </div>
    </div>

    <div class="sequence-inputs">

        <input type="number" id="sequence_a" placeholder="1">
        <input type="number" id="sequence_b" placeholder="2">
        <input type="number" id="sequence_c" placeholder="3">
        <input type="number" id="sequence_d" placeholder="4">

    </div>

    <div class="input-section">
        <label>Green light interval (Sec) </label>
        <input type="number" id="green_interval">
    </div>

    <div class="input-section">
        <label>Yellow light interval (Sec) </label>
        <input type="number" id="yellow_interval">
    </div>

    <div>
        <button id="start">Start</button>
        <button id="stop">Stop</button>
    </div>

    <script>

        let interval;
        let yellowTimeout;

        function startSequence(sequence, greenInterval, yellowInterval) {

            let index = 0;

            clearInterval(interval);
            clearTimeout(yellowTimeout);

            interval = setInterval( () => {
                $('.signal span').css('background-color', 'red');
                

                const currentSignal = sequence[index];

                console.log("currentSignal : ", currentSignal);
                
                if(currentSignal) {
                    $(`#signal_${currentSignal}`).find('span').css('background-color', 'green')
                    
                    yellowTimeout = setTimeout(() => {
                        $(`#signal_${currentSignal}`).find('span').css('background-color', 'yellow')
                        
                    }, greenInterval * 1000);
                    
                }

                index++;

                if(index >= sequence.length) {
                    index = 0;
                }

            }, (greenInterval + yellowInterval) * 1000);

            
        }

        $('#start').click(function() {
            const data = {
                sequence_a: $("#sequence_a").val(),
                sequence_b: $("#sequence_b").val(),
                sequence_c: $("#sequence_c").val(),
                sequence_d: $("#sequence_d").val(),
                green_interval: $("#green_interval").val(),
                yellow_interval: $("#yellow_interval").val()
            }

            if(data.sequence_a !== '' && data.sequence_b !== '' && data.sequence_c !== '' && data.sequence_d !== '' && green_interval !== '' && yellow_interval !== '') {

                console.log("data  :: ", data );


                
                

                $.ajax({
                    url: '<?= site_url('signal/start') ?>',
                    type: 'POST',
                    data: data,
                    dataType: 'json',
                    success: function(response) {
                        // console.log("response : ", response);

                        if(response.status === 'success') {
                            alert(response.message);

                            startSequence([data.sequence_a, data.sequence_b, data.sequence_c, data.sequence_d], data.green_interval, data.yellow_interval);

                        } else {
                            alert(response.message);
                        }
                        
                    }
                });
            } else {
                alert('Please insert sequence');
            }
        });

        $('#stop').click(function() {

            clearInterval(interval);

            $('.signal span').css('background-color', 'red');

        });

    </script>
</body>
</html>