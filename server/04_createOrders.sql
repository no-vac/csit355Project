/*
- Category Definitions:
     - Static = Static
     - Live = Live
     - Multi-Screen = MScreen
     - Interactive = Interactive
     - Hybrid = Hybrid
- Order Status Definitions:
    - Not Shipped
    - Shipped
*/

INSERT INTO orders(pName, quantity, pDescription, category, price, userId, orderStatus, orderTimeStamp, pImage) VALUES(
    'Wood',
    2,
    'This is a simple static wood wallpaper',
    'Static',
    20.0,
    2,
    'Not Shipped',
    '2017-08-23 12:08:00'
);