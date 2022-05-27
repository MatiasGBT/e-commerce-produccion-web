<?php

function paginador($pagina_actual, $cantidad_registros, $registros_por_pagina)
{

    $cantidad_paginas = ceil($cantidad_registros / $registros_por_pagina);

    $resultado = array(
        'primera' => ($pagina_actual > 1) ? 1 : null,
        'anterior' => ($pagina_actual > 1) ? $pagina_actual - 1 : null,
        'actual' => $pagina_actual,
        'siguiente' => ($pagina_actual < $cantidad_paginas) ? $pagina_actual + 1 : null,
        'ultima' => ($pagina_actual < $cantidad_paginas) ? $cantidad_paginas : null,
        'cantidad_paginas' => $cantidad_paginas
    );

    return $resultado;

}