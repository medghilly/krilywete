<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Facture de Réservation - Krilywete</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500;600;700&display=swap" rel="stylesheet">
    <style>
        @media print {
            @page {
                size: A4;
                margin: 1cm;
            }
            body {
                zoom: 90%;
            }
        }

        * {
            box-sizing: border-box;
        }

        body {
            font-family: "Inter", sans-serif;
            margin: 0;
            padding: 0;
            color: #1e293b;
            line-height: 1.5;
            background-color: #f8fafc;
        }

        .container {
            width: 100%;
            max-width: 1000px;
            margin: 0 auto;
            padding: 40px;
            background-color: white;
            box-shadow: 0 0 20px rgba(0,0,0,0.05);
        }

        .header {
            display: flex;
            justify-content: space-between;
            margin-bottom: 30px;
            align-items: flex-start;
            border-bottom: 1px solid #e2e8f0;
            padding-bottom: 20px;
        }

        .logo-container {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .logo-text {
            font-family: 'Montserrat', sans-serif;
            font-size: 24px;
            font-weight: 600;
            color: #2563eb;
            letter-spacing: 1px;
        }

        .invoice-title {
            text-align: center;
            margin-bottom: 40px;
            padding: 20px;
            background: linear-gradient(135deg, #2563eb 0%, #1e40af 100%);
            border-radius: 10px;
            color: white;
        }

        .invoice-title h1 {
            font-size: 28px;
            font-weight: 700;
            margin-bottom: 10px;
            letter-spacing: 1px;
        }

        .invoice-title p {
            font-size: 15px;
            opacity: 0.9;
            max-width: 600px;
            margin: 0 auto;
        }

        .info-section {
            display: flex;
            justify-content: space-between;
            margin-bottom: 40px;
            gap: 20px;
        }

        .info-box {
            flex: 1;
            padding: 25px;
            border-radius: 10px;
            background-color: #f8fafc;
            border: 1px solid #e2e8f0;
            box-shadow: 0 4px 6px -1px rgba(0,0,0,0.05);
        }

        .info-box h2 {
            font-size: 18px;
            margin-top: 0;
            margin-bottom: 20px;
            color: #2563eb;
            border-bottom: 2px solid #2563eb;
            padding-bottom: 8px;
            font-weight: 600;
        }

        .info-item {
            margin-bottom: 10px;
            display: flex;
            font-size: 15px;
        }

        .info-item strong {
            min-width: 130px;
            display: inline-block;
            font-weight: 500;
            color: #475569;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 40px;
            font-size: 15px;
        }

        th, td {
            padding: 15px;
            text-align: left;
            border-bottom: 1px solid #e2e8f0;
        }

        th {
            background-color: #2563eb;
            color: white;
            font-weight: 500;
            text-transform: uppercase;
            font-size: 14px;
            letter-spacing: 0.5px;
        }

        tr:nth-child(even) {
            background-color: #f8fafc;
        }

        tr:hover {
            background-color: #f1f5f9;
        }

        .total-section {
            display: flex;
            justify-content: flex-end;
        }

        .total-box {
            width: 350px;
            border: 1px solid #e2e8f0;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 6px -1px rgba(0,0,0,0.05);
        }

        .total-row {
            display: flex;
            justify-content: space-between;
            padding: 15px 20px;
            border-bottom: 1px solid #e2e8f0;
            font-size: 15px;
        }

        .total-row:last-child {
            border-bottom: none;
            background-color: #f8fafc;
            font-weight: 600;
        }

        .total-row.total-final {
            background: linear-gradient(135deg, #2563eb 0%, #1e40af 100%);
            color: white;
            font-weight: 600;
            font-size: 16px;
        }

        .footer {
            margin-top: 50px;
            text-align: center;
            padding: 25px;
            border-top: 1px solid #e2e8f0;
            font-size: 14px;
            color: #64748b;
            background-color: #f8fafc;
            border-radius: 10px;
        }

        .footer p {
            margin: 8px 0;
        }

        .thank-you {
            text-align: center;
            margin: 40px 0 30px;
            font-size: 17px;
            color: #2563eb;
            font-weight: 500;
            padding: 15px;
            background-color: #f8fafc;
            border-radius: 8px;
            border: 1px dashed #2563eb;
        }

        .barcode {
            margin: 30px auto;
            text-align: center;
            font-family: 'Libre Barcode 128', cursive;
            font-size: 40px;
            color: #1e293b;
            max-width: 400px;
            padding: 10px;
            background-color: #f8fafc;
            border-radius: 8px;
        }

        .invoice-number {
            background-color: #2563eb;
            color: white;
            padding: 8px 15px;
            border-radius: 20px;
            font-weight: 500;
            font-size: 15px;
        }

        .invoice-date {
            color: #64748b;
            font-size: 14px;
            margin-top: 5px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <div class="logo-container">
                <img src="https://via.placeholder.com/60x60?text=KW" alt="Logo Krilywete" style="border-radius: 50%;">
                <div class="logo-text">Krilywete</div>
            </div>
            <div style="text-align: right;">
                <div class="invoice-number">Facture #{{ $reservation->id }}-{{ date('Ymd') }}</div>
                <div class="invoice-date">Émise le: {{ date('d/m/Y') }}</div>
            </div>
        </div>

        <div class="invoice-title">
            <h1>FACTURE DE RÉSERVATION</h1>
            <p>Présentez cette facture (numérique ou imprimée) pour finaliser votre réservation chez Krilywete</p>
        </div>

        <div class="info-section">
            <div class="info-box">
                <h2>Société</h2>
                <div class="info-item"><strong>Nom:</strong> Krilywete SARL</div>
                <div class="info-item"><strong>Adresse:</strong> DR ANABDOUR AMMELEN, TIZNIT</div>
                <div class="info-item"><strong>Téléphone:</strong> +212 637 998 660</div>
                <div class="info-item"><strong>Email:</strong> contact@krilywete.com</div>
                <div class="info-item"><strong>Site web:</strong> www.krilywete.com</div>
            </div>

            <div class="info-box">
                <h2>Client</h2>
                <div class="info-item"><strong>Nom:</strong> {{ $reservation->user->name }}</div>
                <div class="info-item"><strong>Email:</strong> {{ $reservation->user->email }}</div>
                <div class="info-item"><strong>N° Réservation:</strong> KW-{{ $reservation->id }}</div>
                <div class="info-item"><strong>Date Réservation:</strong> {{ $reservation->created_at->format('d/m/Y H:i') }}</div>
            </div>
        </div>

        <table>
            <thead>
                <tr>
                    <th>Véhicule</th>
                    <th>Date début</th>
                    <th>Date fin</th>
                    <th>Durée</th>
                    <th>Prix journalier</th>
                    <th>Montant</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <strong>{{ $reservation->car->brand }} {{ $reservation->car->model }}</strong><br>
                        <span style="color: #64748b;">{{ $reservation->car->engine }}</span>
                    </td>
                    <td>{{ date('d/m/Y', strtotime($reservation->start_date)) }}</td>
                    <td>{{ date('d/m/Y', strtotime($reservation->end_date)) }}</td>
                    <td>{{ $reservation->days }} jours</td>
                    <td>{{ number_format($reservation->price_per_day, 2) }} €</td>
                    <td><strong>{{ number_format($reservation->total_price, 2) }} €</strong></td>
                </tr>
            </tbody>
        </table>

        <div class="total-section">
            <div class="total-box">
                <div class="total-row">
                    <span>Sous-total:</span>
                    <span>{{ number_format($reservation->total_price, 2) }} €</span>
                </div>
                <div class="total-row">
                    <span>TVA (15%):</span>
                    <span>{{ number_format($reservation->total_price * 0.15, 2) }} €</span>
                </div>
                <div class="total-row">
                    <span>Frais de service:</span>
                    <span>0,00 €</span>
                </div>
                <div class="total-row total-final">
                    <span>Total à payer:</span>
                    <span>{{ number_format($reservation->total_price * 1.15, 2) }} €</span>
                </div>
            </div>
        </div>

        <div class="barcode">
            *KW{{ $reservation->id }}*{{ date('Ymd') }}*{{ $reservation->user->id }}*
        </div>

        <div class="thank-you">
            Merci d'avoir choisi Krilywete pour votre location de véhicule ❤️
        </div>

        <div class="footer">
            <p><strong>Krilywete SARL</strong> - Capital social: 100 000 DH - RC: 12345 - IF: 987654</p>
            <p>Adresse: DR ANABDOUR AMMELEN, TIZNIT - Tél: +212 637 998 660</p>
            <p>Email: contact@krilywete.com - Site web: www.krilywete.com</p>
        </div>
    </div>

    <script>
        window.addEventListener('load', function() {
            // Auto-print the invoice when loaded
            setTimeout(function() {
                window.print();
            }, 500);
            
            // Close the window after printing (with delay to allow print dialog to show)
            setTimeout(function() {
                window.close();
            }, 1500);
        });
    </script>
</body>

</html>