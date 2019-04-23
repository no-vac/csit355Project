/*
- Category Definitions:
     - Static = Static
     - Live = Live
     - Multi-Screen = MScreen
     - Interactive = Interactive
     - Hybrid = Hybrid
- Product Status:
    - Cart = product in cart
    - Empty = not in cart
*/

INSERT INTO products(pName, quantity, pDescription, category, price, tax, productStatus, minOrder) VALUES(
    'Wood',
    2,
    'This is a simple static wood wallpaper',
    'Static',
    20.0,
    .6,
    'Cart',
    1
);