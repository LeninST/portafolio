<?php
// Redirección a sistema de posgrado UNAM
// URL destino
$url_destino = "https://sistema-posgrado.derecho.unam.mx/constancias/validar.php/255JF2025-25273";

// Validar que la URL sea válida (medida de seguridad)
if (filter_var($url_destino, FILTER_VALIDATE_URL)) {
    // Redirección permanente (301) - más apropiada para URLs fijas
    http_response_code(301);
    header("Location: " . $url_destino);
    
    // Mensaje alternativo si los headers fallan
    echo '<script>window.location.href="' . htmlspecialchars($url_destino, ENT_QUOTES, 'UTF-8') . '";</script>';
    echo '<noscript><meta http-equiv="refresh" content="0;url=' . htmlspecialchars($url_destino, ENT_QUOTES, 'UTF-8') . '"></noscript>';
    
    // Mensaje de respaldo
    echo '<p>Si no eres redirigido automáticamente, <a href="' . htmlspecialchars($url_destino, ENT_QUOTES, 'UTF-8') . '">haz clic aquí</a></p>';
    
    // Terminar ejecución para evitar contenido adicional
    exit();
} else {
    // Error si la URL no es válida
    http_response_code(400);
    echo "Error: URL de destino no válida";
}
?>