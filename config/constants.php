<?php

const ORDER_STATUSES = [
    'PROCESSING' => [
        'id' => 1,
        'text' => 'Processing',
        'description' => 'We have recieved your order. One of our representative will contact you soon to confirm the order.'
    ],
    'PACKED' => [
        'id' => 2,
        'text' => 'Packed',
        'description' => 'Your order has been packed. We request you to check your email for payment information.'
    ],
    'SHIPPED' => [
        'id' => 3,
        'text' => 'Shipped',
        'description' => 'We have shipped your order with DELIVERY_COMPANY. your tracking code is TRACKING_NUMBER.'
    ],
    'COMPLETED' => [
        'id' => 4,
        'text' => 'Completed',
        'description' => 'Your order has been delivered. Thank you for shopping with us'
    ],
    'UNDELIVERED' => [
        'id' => 5,
        'text' => 'Undelivered',
        'description' => 'Due to some reasons your order was not delivered'
    ],
    'CANCELLED' => [
        'id' => 6,
        'text' => 'Cancelled',
        'description' => 'Your order has been cancelled'
    ]
];
const DELIVERY_COMPANY = [
    'FEDEX' => [
        'id' => 1,
        'text' => 'Fedex',
    ],
    'DELHIVERY' => [
        'id' => 2,
        'text' => 'Delhivery',
    ],
    'BLUE_DART' => [
        'id' => 3,
        'text' => 'Blue Dart',
    ],
];
