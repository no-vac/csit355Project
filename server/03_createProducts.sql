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

INSERT INTO products(pName, quantity, pDescription, category, price, tax, productStatus, minOrder, pImage) VALUES(
    'Static 1',
    11,
    'This is static 1',
    'Static',
    120.0,
    .35,
    'Inactive',
    2,
    '../assets/products/static/product-static-1.png'  
);

INSERT INTO products(pName, quantity, pDescription, category, price, tax, productStatus, minOrder, pImage) VALUES(
    'Static 2',
    11,
    'This is static 2',
    'Static',
    120.0,
    .35,
    'Inactive',
    2,
    '../assets/products/static/product-static-2.png'  
);

INSERT INTO products(pName, quantity, pDescription, category, price, tax, productStatus, minOrder, pImage) VALUES(
    'Static 3',
    40,
    'This is static 3',
    'Static',
    120.0,
    .35,
    'Active',
    2,
    '../assets/products/static/product-static-3.png'  
);

INSERT INTO products(pName, quantity, pDescription, category, price, tax, productStatus, minOrder, pImage) VALUES(
    'Static 4',
    11,
    'This is static 4',
    'Static',
    120.0,
    .35,
    'Inactive',
    2,
    '../assets/products/static/product-static-4.png'  
);

INSERT INTO products(pName, quantity, pDescription, category, price, tax, productStatus, minOrder, pImage) VALUES(
    'Static 5',
    3,
    'This is static 5',
    'Static',
    12.0,
    .25,
    'Active',
    23,
    '../assets/products/static/product-static-5.png'  
);

INSERT INTO products(pName, quantity, pDescription, category, price, tax, productStatus, minOrder, pImage) VALUES(
    'Multi-Screen 1',
    3,
    'This is multi-screen 1',
    'Multi-Screen',
    12.0,
    .25,
    'Inactive',
    23,
    '../assets/products/static/product-multi-screen-1.png'  
);

INSERT INTO products(pName, quantity, pDescription, category, price, tax, productStatus, minOrder, pImage) VALUES(
    'Multi-Screen 2',
    2,
    'This is multi-screen 2',
    'Multi-Screen',
    2.0,
    .45,
    'Inactive',
    33,
    '../assets/products/static/product-multi-screen-2.png'  
);

INSERT INTO products(pName, quantity, pDescription, category, price, tax, productStatus, minOrder, pImage) VALUES(
    'Multi-Screen 3',
    3,
    'This is multi-screen 3',
    'Multi-Screen',
    12.0,
    .25,
    'Active',
    23,
    '../assets/products/static/product-multi-screen-3.png'  
);

INSERT INTO products(pName, quantity, pDescription, category, price, tax, productStatus, minOrder, pImage) VALUES(
    'Multi-Screen 4',
    1,
    'This is multi-screen 4',
    'Multi-Screen',
    1.0,
    .85,
    'Inactive',
    5,
    '../assets/products/static/product-multi-screen-4.png'  
);

INSERT INTO products(pName, quantity, pDescription, category, price, tax, productStatus, minOrder, pImage) VALUES(
    'Multi-Screen 5',
    4,
    'This is multi-screen 5',
    'Multi-Screen',
    110.0,
    .35,
    'Active',
    3,
    '../assets/products/static/product-multi-screen-5.png'  
);