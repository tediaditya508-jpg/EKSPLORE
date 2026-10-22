
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EKSPLORE - Simulasi HP</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            min-height: 100vh;
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #101827, #1e3a5f);
            color: white;
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 25px 15px;
        }

        .toolbar {
            width: 100%;
            max-width: 600px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 12px;
            margin-bottom: 22px;
        }

        .toolbar h2 {
            font-size: 18px;
            margin: 0;
        }

        .exit-button {
            background: #ef4444;
            color: white;
            border: 0;
            border-radius: 10px;
            padding: 10px 15px;
            cursor: pointer;
            font-weight: bold;
        }

        .exit-button:hover {
            background: #dc2626;
        }

        
.phone {
    width: 420px;
    max-width: 100%;
    height: 780px;
    max-height: calc(100vh - 125px);
    min-height: 480px;
    background: #080808;
    border: 8px solid #343434;
    border-radius: 38px;
    padding: 7px;
    box-shadow: 0 20px 60px #0008;
    position: relative;
    overflow: hidden;
    display: flex;
    flex-direction: column;
}


        .status-bar {
            height: 34px;
            min-height: 34px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 14px;
            font-size: 12px;
            background: #fff;
            color: #111;
            border-radius: 24px 24px 0 0;
        }

        .status-icons {
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .battery {
            width: 22px;
            height: 11px;
            border: 1.5px solid currentColor;
            border-radius: 3px;
            padding: 1.5px;
            position: relative;
        }

        .battery::after {
            content: "";
            position: absolute;
            right: -4px;
            top: 2px;
            width: 2px;
            height: 4px;
            background: currentColor;
            border-radius: 0 2px 2px 0;
        }

        .battery-level {
            height: 100%;
            width: 85%;
            background: #16a34a;
            border-radius: 1px;
        }

        .phone-screen {
            flex: 1;
            min-height: 0;
            background: white;
            overflow: hidden;
            position: relative;
        }

        .phone-screen iframe {
            width: 100%;
            height: 100%;
            display: block;
            border: 0;
            background: white;
        }

        .home-indicator {
            height: 18px;
            min-height: 18px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: white;
            border-radius: 0 0 24px 24px;
        }

        .home-indicator span {
            width: 95px;
            height: 4px;
            border-radius: 10px;
            background: #111;
        }

        @media (max-width: 400px) {
            body {
                padding: 12px 8px;
            }

            .toolbar {
                margin-bottom: 12px;
            }

            .phone {
                width: 100%;
                height: calc(100vh - 95px);
                max-height: none;
                min-height: 0;
            }
        }
    </style>
</head>

<body>

    <div class="toolbar">

        <button class="exit-button"
            onclick="window.location.href='{{ url('/') }}'">
            ✕ Keluar
        </button>
    </div>

    <div class="phone">

        <div class="status-bar">
            <span id="phone-time">08:00</span>

            <div class="status-icons">
                <span title="Sinyal">▂▄▆█</span>
                <span title="Wi-Fi">◉</span>

                <div class="battery" title="Baterai simulasi 85%">
                    <div class="battery-level"></div>
                </div>
                <span>85%</span>
            </div>
        </div>

        <div class="phone-screen">
            <iframe
                src="{{ url('/dashboard') }}"
                title="Simulasi dashboard EKSPLORE">
            </iframe>
        </div>

        <div class="home-indicator">
            <span></span>
        </div>

    </div>

    <script>
        function updatePhoneTime() {
            const now = new Date();

            document.getElementById('phone-time').textContent =
                now.toLocaleTimeString('id-ID', {
                    hour: '2-digit',
                    minute: '2-digit',
                    hour12: false
                });
        }

        updatePhoneTime();
        setInterval(updatePhoneTime, 1000);
    </script>

</body>
</html>
