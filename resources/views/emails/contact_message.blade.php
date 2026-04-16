<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body { font-family: 'Helvetica Neue', Arial, sans-serif; background-color: #f6f6f6; margin: 0; padding: 20px; }
        .email-container { max-width: 600px; margin: 0 auto; background: #ffffff; border-top: 5px solid #d4ed31; border-radius: 8px; overflow: hidden; box-shadow: 0 4px 10px rgba(0,0,0,0.1); }
        .header { background: #000000; color: #ffffff; padding: 30px 20px; text-align: center; }
        .header h1 { margin: 0; font-size: 24px; font-weight: 900; letter-spacing: 2px; }
        .header p { color: #d4ed31; font-size: 12px; letter-spacing: 1px; margin-top: 10px; text-transform: uppercase; }
        .content { padding: 30px; color: #333333; line-height: 1.6; }
        .info-box { background: #fbfbfb; border: 1px solid #eaeaea; padding: 20px; border-radius: 4px; margin-bottom: 20px; }
        .info-item { margin-bottom: 15px; }
        .info-label { font-size: 11px; color: #888888; text-transform: uppercase; font-weight: bold; letter-spacing: 1px; display: block; margin-bottom: 5px; }
        .info-val { font-size: 16px; color: #000; font-weight: bold; }
        .message-content { background: #f9f9f9; padding: 20px; border-left: 4px solid #000000; font-style: italic; color: #555; }
        .footer { text-align: center; font-size: 12px; color: #aaaaaa; padding: 20px; background: #f1f1f1; }
    </style>
</head>
<body>
    <div class="email-container">
        <div class="header">
            <h1>MAYOR DE REPUESTO LA CIMA, C.A. - ERP</h1>
            <p>RIF: J-40308741-5 | Notificación de la Plataforma</p>
        </div>
        <div class="content">
            <h2 style="font-size: 20px; color: #000; margin-top: 0;">Requerimiento Administrativo / Ventas</h2>
            <p>Se ha registrado un nuevo contacto a través de la plataforma web en el departamento de <strong>{{ $messageData->asunto }}</strong>.</p>
            
            <div class="info-box">
                <div class="info-item">
                    <span class="info-label">Empresa / Nombre:</span>
                    <span class="info-val">{{ $messageData->nombre }}</span>
                </div>
                <div class="info-item">
                    <span class="info-label">Email de contacto:</span>
                    <span class="info-val">{{ $messageData->email }}</span>
                </div>
                <div class="info-item">
                    <span class="info-label">Teléfono:</span>
                    <span class="info-val">{{ $messageData->telefono ?? 'No proporcionado' }}</span>
                </div>
                <div class="info-item">
                    <span class="info-label">Asunto o Departamento:</span>
                    <span class="info-val">{{ $messageData->asunto }}</span>
                </div>
            </div>

            <p style="font-weight: bold; text-transform: uppercase; font-size: 12px; letter-spacing: 1px;">Especificaciones del Requerimiento:</p>
            <div class="message-content">
                {{ $messageData->mensaje }}
            </div>
            
        </div>
        <div class="footer">
            IP Origen: {{ $messageData->ip_address }} | Generado Automáticamente por la plataforma web La Cima.
        </div>
    </div>
</body>
</html>
