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

INSERT INTO products(pName, quantity, pDescription, category, price, tax, productStatus, minOrder, pImage) VALUES(
    'Wood',
    2,
    'This is a simple static wood wallpaper',
    'Static',
    20.0,
    .6,
    'Active',
    1,
    '../assets/products/test-product01.png'  
);

INSERT INTO products(pName, quantity, pDescription, category, price, tax, productStatus, minOrder, pImage) VALUES(
    'Mahogany',
    15,
    'A beautiful mahogany test product',
    'Hybrid',
    150.0,
    .65,
    'Inactive',
    5,
    '../assets/products/test-product02.png'  
);