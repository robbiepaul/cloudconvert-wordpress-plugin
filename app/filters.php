<?php
add_filter ( 'media_row_actions', 'WPCloudConvert\Controllers\ConversionController::filter', 10, 2);