<?php
define("CONTROLADOR_DEFECTO", "Main");
define("ACCION_DEFECTO", "index");
define("LENGUAGE_DEFAULT", "1");
define("USER_DEFAULT", "0");
define("PATH_IMAGE", "assets/images/products/");

/*
------------------------------
VISTAS
------------------------------
*/
define("CONTROLADOR_MAIN", "Main");
define("CONTROLADOR_DESIGNER", "Designer");
define("CONTROLADOR_CONTACT", "Contact");
define("CONTROLADOR_THANKYOU", "Thankyou");
define("CONTROLADOR_MESSAGE_PAY", "MessagePay");
define("CONTROLADOR_LOGIN", "Login");
define("CONTROLADOR_ACCOUNT", "Account");
define("CONTROLADOR_USER", "User");
define("CONTROLADOR_SCHEDULE", "Schedule");
define("CONTROLADOR_CATALOG", "Catalog");
define("CONTROLADOR_CATALOG_RENT", "CatalogRent");
define("CONTROLADOR_SEARCH", "Search");
define("CONTROLADOR_PAY", "Pay");
define("CONTROLADOR_OPEN_PAY", "OpenPay");
define("CONTROLADOR_PRODUCT", "Product");
define("CONTROLADOR_PRODUCT_RENT", "ProductRent");
define("CONTROLADOR_USUARIOS", "Usuarios");
define("CONTROLADOR_PAGINA2", "Pagina2");
define("CONTROLADOR_ADMINLOGIN", "adminLogin");
define("CONTROLADOR_ADMIN", "Admin");
define("CONTROLADOR_ADMIN_BRANCH", "AdminBranch");
define("CONTROLADOR_ADMIN_BRANCH_PHONE", "AdminBranchPhone");
define("CONTROLADOR_ADMIN_USER", "AdminUser");
define("CONTROLADOR_ADMIN_CARD", "AdminCard");
define("CONTROLADOR_ADMIN_KID_BY_CARD", "AdminKidByCard");
define("CONTROLADOR_ADMIN_PROMOTION", "AdminPromotion");
define("CONTROLADOR_ADMIN_QUIZ", "AdminQuiz");
define("CONTROLADOR_ADMIN_USER_TEST", "AdminUserTest");
define("CONTROLADOR_ADMIN_TEST", "AdminTest");
define("CONTROLADOR_ADMIN_RESPONSE", "AdminResponse");
define("CONTROLADOR_ADMIN_QUESTIONS", "AdminQuestions");
define("CONTROLADOR_ADMIN_COLOR", "AdminColor");
define("CONTROLADOR_ADMIN_SIZE", "AdminSize");
define("CONTROLADOR_ADMIN_PRODUCT", "AdminProduct");
define("CONTROLADOR_ADMIN_REPORT_SALE", "AdminReportSale");
define("CONTROLADOR_ADMIN_REPORT_RENT", "AdminReportRent");
define("CONTROLADOR_ADMIN_REPORT_MAKING", "AdminReportMaking");
define("CONTROLADOR_ADMIN_STOCK_PRODUCT", "AdminStockProduct");
define("CONTROLADOR_ADMIN_SALE", "AdminSale");
define("CONTROLADOR_ADMIN_RENT", "AdminRent");
define("CONTROLADOR_ADMIN_MAKING", "AdminMaking");
define("CONTROLADOR_ADMIN_SETTING", "AdminSetting");
define("CONTROLADOR_ADMIN_CALENDAR", "AdminCalendar");
/*
------------------------------
Tables Names
------------------------------
*/
defined("TABLE_TYPE_PAYMENT") OR define("TABLE_TYPE_PAYMENT", "TypePayment");
defined("TABLE_TYPE_PURCHASE") OR define("TABLE_TYPE_PURCHASE", "TypePurchase");
defined("TABLE_STOCK_PRODUCT") OR define("TABLE_STOCK_PRODUCT", "StockProduct");
defined("TABLE_TYPE_PRODUCT") OR define("TABLE_TYPE_PRODUCT", "TypeProduct");
defined("TABLE_PRODUCT") OR define("TABLE_PRODUCT", "Product");
defined("TABLE_HOUR") OR define("TABLE_HOUR", "Hour");
defined("TABLE_CP") OR define("TABLE_CP", "CP");
defined("TABLE_NOTIFICATIONS") OR define("TABLE_NOTIFICATIONS", "Notifications");
defined("TABLE_COLOR") OR define("TABLE_COLOR", "Color");
defined("TABLE_CARD") OR define("TABLE_CARD", "Card");
defined("TABLE_KID_BY_CARD") OR define("TABLE_KID_BY_CARD", "KidByCard");
defined("TABLE_PROMOTION") OR define("TABLE_PROMOTION", "Promotion");
defined("TABLE_TYPE_PROMOTION") OR define("TABLE_TYPE_PROMOTION", "TypePromotion");
defined("TABLE_SCHEDULE") OR define("TABLE_SCHEDULE", "Schedule");
defined("TABLE_PURCHASE_HISTORY") OR define("TABLE_PURCHASE_HISTORY", "PurchaseHistory");
defined("TABLE_SIZE") OR define("TABLE_SIZE", "Size");
defined("TABLE_TYPE_SCHEDULE") OR define("TABLE_TYPE_SCHEDULE", "TypeSchedule");
defined("TABLE_BRANCH") OR define("TABLE_BRANCH", "Branch");
defined("TABLE_BRANCH_PHONE") OR define("TABLE_BRANCH_PHONE", "BranchPhone");
defined("TABLE_SOCIAL_NETWORKS") OR define("TABLE_SOCIAL_NETWORKS", "SocialNetworks");
defined("TABLE_SENDING_SETTINGS") OR define("TABLE_SENDING_SETTINGS", "SendingSettings");
defined("TABLE_LANGUAGE") OR define("TABLE_LANGUAGE", "Language");
defined("TABLE_USER") OR define("TABLE_USER", "User");
defined("TABLE_PERMISSIONS") OR define("TABLE_PERMISSIONS", "Permissions");
defined("TABLE_USER_TEST") OR define("TABLE_USER_TEST", "UserTest");
defined("TABLE_COMMENT_TEST") OR define("TABLE_COMMENT_TEST", "CommentTest");
defined("TABLE_QUIZ") OR define("TABLE_QUIZ", "Quiz");
defined("TABLE_QUESTIONS") OR define("TABLE_QUESTIONS", "Questions");
defined("TABLE_MAIN") OR define("TABLE_MAIN", "Main");
defined("TABLE_DESIGNER") OR define("TABLE_DESIGNER", "Designer");



/*
------------------------------
Idioma ESPAÑOL
------------------------------
*/
/*ESPAÑOL*/
//Menu
defined("TITLE_INFO_ESP") OR define("TITLE_INFO_ESP", "¡Envios a todo México!");
defined("SEARCH_MENU_ESP") OR define("SEARCH_MENU_ESP", "Buscar");
defined("SIGN_IN_MENU_ESP") OR define("SIGN_IN_MENU_ESP", "Acceder");
defined("CART_MENU_ESP") OR define("CART_MENU_ESP", "Carrito");
defined("MAIN_MENU_ESP") OR define("MAIN_MENU_ESP", "INICIO");
defined("DESIGNER_MENU_ESP") OR define("DESIGNER_MENU_ESP", "VALERIA SÁNCHEZ");
defined("CATALOG_MENU_ESP") OR define("CATALOG_MENU_ESP", "CATÁLOGO");
defined("SCHEDULE_MENU_ESP") OR define("SCHEDULE_MENU_ESP", "AGENDAR CITA");
defined("SIZE_MENU_ESP") OR define("SIZE_MENU_ESP", "Talla");
defined("COLOR_MENU_ESP") OR define("COLOR_MENU_ESP", "Color");
defined("PIECES_MENU_ESP") OR define("PIECES_MENU_ESP", "Piezas");
defined("CONTACT_MENU_ESP") OR define("CONTACT_MENU_ESP", "CONTACTANOS");
defined("FOLLOW_FOOTER_ESP") OR define("FOLLOW_FOOTER_ESP", "Síguenos");
//Main
defined("SECCION1_TITLE_MAIN_ESP") OR define("SECCION1_TITLE_MAIN_ESP", "TODO LO QUE NECESITAS");
defined("SECCION2_TITLE_MAIN_ESP") OR define("SECCION2_TITLE_MAIN_ESP", "Nueva colección");
defined("SECCION2_SUBTITLE_MAIN_ESP") OR define("SECCION2_SUBTITLE_MAIN_ESP", "Otoño Invierno 2022");
defined("SECCION2_TEXT_MAIN_ESP") OR define("SECCION2_TEXT_MAIN_ESP", "Valeria Sánchez es la creadora de esta boutique que ofrece una experiencia única y atención personalizada para cada niña. Hoy en día sus diseños han marcado tendencia.");
defined("SECCION2_BUTTON_MAIN_ESP") OR define("SECCION2_BUTTON_MAIN_ESP", "Descubre la colección");
defined("SECCION3_TITLE_MAIN_ESP") OR define("SECCION3_TITLE_MAIN_ESP", "VESTIDOS DE TEMPORADA");
defined("SECCION4_TITLE_MAIN_ESP") OR define("SECCION4_TITLE_MAIN_ESP", "Conocenos");
defined("SECCION4_SUBTITLE_MAIN_ESP") OR define("SECCION4_SUBTITLE_MAIN_ESP", "Ven y enamórate");
defined("SECCION4_TEXT_MAIN_ESP") OR define("SECCION4_TEXT_MAIN_ESP", "Visita cualquiera de nuestras sucursales y dejate llevar por nuestros increíbles diseños que tenemos para ti.");
defined("SECCION4_BUTTON_MAIN_ESP") OR define("SECCION4_BUTTON_MAIN_ESP", "Ver sucursales");
defined("SECCION5_TITLE_MAIN_ESP") OR define("SECCION5_TITLE_MAIN_ESP", "DISEÑOS EXCLUSIVOS");
//Catalog
defined("CATALOG_FILTER_ESP") OR define("CATALOG_FILTER_ESP", "Filtrar");
defined("CATALOG_ADD_CART_ESP") OR define("CATALOG_ADD_CART_ESP", "Agregar");
defined("CATALOG_SIZE_ESP") OR define("CATALOG_SIZE_ESP", "Talla");
defined("CATALOG_COLOR_ESP") OR define("CATALOG_COLOR_ESP", "Color");
defined("CATALOG_PIECES_ESP") OR define("CATALOG_PIECES_ESP", "Piezas");
defined("CATALOG_TYPE_ESP") OR define("CATALOG_TYPE_ESP", "Tipo");
defined("CATALOG_BRANCH_ESP") OR define("CATALOG_BRANCH_ESP", "Sucursal");
defined("CATALOG_PRICE_ESP") OR define("CATALOG_PRICE_ESP", "Precio");
//Search
defined("SEARCH_FILTER_ESP") OR define("SEARCH_FILTER_ESP", "¿Que estas buscando?");
defined("SEARCH_SALE_ESP") OR define("SEARCH_SALE_ESP", "Venta");
defined("SEARCH_RENT_ESP") OR define("SEARCH_RENT_ESP", "Renta");
//CAR
defined("CAR_TITLE_ESP") OR define("CAR_TITLE_ESP", "Carrito");
defined("CAR_SHIPPING_ESP") OR define("CAR_SHIPPING_ESP", "Envio");
defined("CAR_PAY_ESP") OR define("CAR_PAY_ESP", "Pagar");
//CONTACT
defined("SECCION1_TITLE_CONTACT_ESP") OR define("SECCION1_TITLE_CONTACT_ESP", "Contactanos");
defined("SECCION1_SUBTITLE_CONTACT_ESP") OR define("SECCION1_SUBTITLE_CONTACT_ESP", "Sucursal");
defined("SECCION2_TITLE_CONTACT_ESP") OR define("SECCION2_TITLE_CONTACT_ESP", "Ponte en contacto con nosotros");
defined("SECCION3_TITLE_CONTACT_ESP") OR define("SECCION3_TITLE_CONTACT_ESP", "Envíanos tu mensaje");
defined("SECCION3_EMAIL_CONTACT_ESP") OR define("SECCION3_EMAIL_CONTACT_ESP", "tu@email.com");
defined("SECCION3_MESSAGE_CONTACT_ESP") OR define("SECCION3_MESSAGE_CONTACT_ESP", "¿Como podemos ayudarte?");
defined("SECCION3_SEND_CONTACT_ESP") OR define("SECCION3_SEND_CONTACT_ESP", "Enviar");
//TANKYOUCONTACT
defined("SECCION1_TITLE_TANKYOUCONTACT_ESP") OR define("SECCION1_TITLE_TANKYOUCONTACT_ESP", "¡Gracias por su preferencia!");
defined("SECCION1_SUBTITLE_TANKYOUCONTACT_ESP") OR define("SECCION1_SUBTITLE_TANKYOUCONTACT_ESP", "En breve nos comunicaremos con usted");
defined("SECCION1_BUTTON_TANKYOUCONTACT_ESP") OR define("SECCION1_BUTTON_TANKYOUCONTACT_ESP", "Volver");
//LOGIN
defined("SECCION1_TITLE_LOGIN_ESP") OR define("SECCION1_TITLE_LOGIN_ESP", "Ingrese a su cuenta");
defined("SECCION1_EMAIL_LOGIN_ESP") OR define("SECCION1_EMAIL_LOGIN_ESP", "Correo");
defined("SECCION1_PASSWORD_LOGIN_ESP") OR define("SECCION1_PASSWORD_LOGIN_ESP", "Contraseña");
defined("SECCION1_ERROR_LOGIN_ESP") OR define("SECCION1_ERROR_LOGIN_ESP", "Ingrese su correo y contraseña");
defined("SECCION1_USER_NOT_VALID_LOGIN_ESP") OR define("SECCION1_USER_NOT_VALID_LOGIN_ESP", "El usuario o contraseña no existe");
defined("SECCION1_BUTTON_LOGIN_ESP") OR define("SECCION1_BUTTON_LOGIN_ESP", "Ingresar");
defined("SECCION1_NO_ACCOUNT_LOGIN_ESP") OR define("SECCION1_NO_ACCOUNT_LOGIN_ESP", "Crear una cuenta");
//ACCOUNT
defined("SECCION1_TITLE_ACCOUNT_ESP") OR define("SECCION1_TITLE_ACCOUNT_ESP", "Crea una cuenta");
defined("SECCION1_SUBTITLE_ACCOUNT_ESP") OR define("SECCION1_SUBTITLE_ACCOUNT_ESP", "¿Ya tienes una cuenta?");
defined("SECCION1_NAME_ACCOUNT_ESP") OR define("SECCION1_NAME_ACCOUNT_ESP", "Nombre");
defined("SECCION1_EMAIL_ACCOUNT_ESP") OR define("SECCION1_EMAIL_ACCOUNT_ESP", "Correo");
defined("SECCION1_PASSWORD_ACCOUNT_ESP") OR define("SECCION1_PASSWORD_ACCOUNT_ESP", "Contraseña");
defined("SECCION1_MIN_PASSWORD_ACCOUNT_ESP") OR define("SECCION1_MIN_PASSWORD_ACCOUNT_ESP", "Introduzca una contraseña de minimo 8 caracteres");
defined("SECCION1_CONFIRM_PASSWORD_ACCOUNT_ESP") OR define("SECCION1_CONFIRM_PASSWORD_ACCOUNT_ESP", "Confirmar contraseña");
defined("SECCION1_PHONE_ACCOUNT_ESP") OR define("SECCION1_PHONE_ACCOUNT_ESP", "Teléfono");
defined("SECCION1_ADDRESS_ACCOUNT_ESP") OR define("SECCION1_ADDRESS_ACCOUNT_ESP", "Dirección");
defined("SECCION1_CP_ACCOUNT_ESP") OR define("SECCION1_CP_ACCOUNT_ESP", "CP");
defined("SECCION1_ERROR_ACCOUNT_ESP") OR define("SECCION1_ERROR_ACCOUNT_ESP", "Ingrese todos sus datos y confirme su fecha de evento");
defined("SECCION1_USER_NOT_VALID_ACCOUNT_ESP") OR define("SECCION1_USER_NOT_VALID_ACCOUNT_ESP", "El usuario ya se encuentra registrado en el sistema");
defined("SECCION1_BUTTON_ACCOUNT_ESP") OR define("SECCION1_BUTTON_ACCOUNT_ESP", "Regristrarme");
//SCHEDULE
defined("SECCION1_TITLE_SCHEDULE_ESP") OR define("SECCION1_TITLE_SCHEDULE_ESP", "Agenda con nosotros");
defined("SECCION1_NAME_SCHEDULE_ESP") OR define("SECCION1_NAME_SCHEDULE_ESP", "Nombre");
defined("SECCION1_PHONE_SCHEDULE_ESP") OR define("SECCION1_PHONE_SCHEDULE_ESP", "Teléfono");
defined("SECCION1_BRANCH_SCHEDULE_ESP") OR define("SECCION1_BRANCH_SCHEDULE_ESP", "Sucursal");
defined("SECCION1_ADDRESS_PROOF_SCHEDULE_ESP") OR define("SECCION1_ADDRESS_PROOF_SCHEDULE_ESP", "Comprobante de domicilio");
defined("SECCION1_TYPE_SCHEDULE_SCHEDULE_ESP") OR define("SECCION1_TYPE_SCHEDULE_SCHEDULE_ESP", "Tipo de cita");
defined("SECCION1_TEXT_TYPE_SCHEDULE_SCHEDULE_ESP") OR define("SECCION1_TEXT_TYPE_SCHEDULE_SCHEDULE_ESP", "Selecciona el tipo de cita");
defined("SECCION1_TEXT_RENT_TYPE_SCHEDULE_SCHEDULE_ESP") OR define("SECCION1_TEXT_RENT_TYPE_SCHEDULE_SCHEDULE_ESP", "Renta");
defined("SECCION1_TEXT_SALE_TYPE_SCHEDULE_SCHEDULE_ESP") OR define("SECCION1_TEXT_SALE_TYPE_SCHEDULE_SCHEDULE_ESP", "Venta");
defined("SECCION1_TEXT_MAKING_TYPE_SCHEDULE_SCHEDULE_ESP") OR define("SECCION1_TEXT_MAKING_TYPE_SCHEDULE_SCHEDULE_ESP", "Confección");
defined("SECCION1_EVENT_DATE_SCHEDULE_ESP") OR define("SECCION1_EVENT_DATE_SCHEDULE_ESP", "Fecha de evento");
defined("SECCION1_DATE_DELIVERY_SCHEDULE_ESP") OR define("SECCION1_DATE_DELIVERY_SCHEDULE_ESP", "Fecha de entrega");
defined("SECCION1_TEXT_SELECT_BRANCH_SCHEDULE_ESP") OR define("SECCION1_TEXT_SELECT_BRANCH_SCHEDULE_ESP", "Selecciona la sucursal");
defined("SECCION1_HOUR_SCHEDULE_ESP") OR define("SECCION1_HOUR_SCHEDULE_ESP", "Hora");
defined("SECCION1_MODEL_SCHEDULE_ESP") OR define("SECCION1_MODEL_SCHEDULE_ESP", "Modelo");
defined("SECCION1_TEXT_SELECT_MODEL_SCHEDULE_ESP") OR define("SECCION1_TEXT_SELECT_MODEL_SCHEDULE_ESP", "Selecciona el modelo");
defined("SECCION1_TEXT_HOUR_SCHEDULE_ESP") OR define("SECCION1_TEXT_HOUR_SCHEDULE_ESP", "Selecciona una hora");
defined("SECCION1_CHECK_EVENT_SCHEDULE_ESP") OR define("SECCION1_CHECK_EVENT_SCHEDULE_ESP", "¿Su fecha de evento es correcta?");
defined("SECCION1_COLOR_SCHEDULE_ESP") OR define("SECCION1_COLOR_SCHEDULE_ESP", "Color");
defined("SECCION1_SIZE_SCHEDULE_ESP") OR define("SECCION1_SIZE_SCHEDULE_ESP", "Talla");
defined("SECCION1_INE_SCHEDULE_ESP") OR define("SECCION1_INE_SCHEDULE_ESP", "Identificación");
defined("SECCION1_ADVANCE_SCHEDULE_ESP") OR define("SECCION1_ADVANCE_SCHEDULE_ESP", "Cobro para separación");
defined("SECCION1_MESSAGE_NOT_AVAILABLE_SCHEDULE_ESP") OR define("SECCION1_MESSAGE_NOT_AVAILABLE_SCHEDULE_ESP", "Producto no disponible en esta fecha");
defined("SECCION1_TEXT_SIZE_SCHEDULE_ESP") OR define("SECCION1_TEXT_SIZE_SCHEDULE_ESP", "Selecciona una talla");
defined("SECCION1_TEXT_COLOR_SCHEDULE_ESP") OR define("SECCION1_TEXT_COLOR_SCHEDULE_ESP", "Selecciona el color");
defined("SECCION1_AGE_SCHEDULE_ESP") OR define("SECCION1_AGE_SCHEDULE_ESP", "Edad");
defined("SECCION1_PRICE_RANGE_SCHEDULE_ESP") OR define("SECCION1_PRICE_RANGE_SCHEDULE_ESP", "Rango de precio");
defined("SECCION1_BUTTON_SCHEDULE_ESP") OR define("SECCION1_BUTTON_SCHEDULE_ESP", "Agendar");
defined("SECCION1_MESSAGE_SCHEDULE_ESP") OR define("SECCION1_MESSAGE_SCHEDULE_ESP", "Es necesario iniciar sesion para agendar una cita");
defined("SECCION1_MESSAGE_ERROR_CP_SCHEDULE_ESP") OR define("SECCION1_MESSAGE_ERROR_CP_SCHEDULE_ESP", "Lo sentimos por el momento su dirección no puede participar en la renta de productos.");
defined("SECCION1_MESSAGE_DOUBTS_SCHEDULE_ESP") OR define("SECCION1_MESSAGE_DOUBTS_SCHEDULE_ESP", "Para dudas o aclaraciones puedes comunicarse via Whatsapp a los siguientes teléfonos");
//Product
defined("PRODUCT_ADD_CART_ESP") OR define("PRODUCT_ADD_CART_ESP", "Agregar");
defined("PRODUCT_SIZE_ESP") OR define("PRODUCT_SIZE_ESP", "Talla");
defined("PRODUCT_COLOR_ESP") OR define("PRODUCT_COLOR_ESP", "Color");
defined("PRODUCT_PIECES_ESP") OR define("PRODUCT_PIECES_ESP", "Piezas");
defined("PRODUCT_DESCRIPTION_ESP") OR define("PRODUCT_DESCRIPTION_ESP", "Descripción");
//Pay
defined("PAY_TITLE_ESP") OR define("PAY_TITLE_ESP", "Metodo de pago");
defined("PAY_NAME_ESP") OR define("PAY_NAME_ESP", "Nombre");
defined("PAY_CARD_NUMBER_ESP") OR define("PAY_CARD_NUMBER_ESP", "Número de tarjeta");
defined("PAY_EXPIRY_DATE_ESP") OR define("PAY_EXPIRY_DATE_ESP", "Fecha");
defined("PAY_PAY_ESP") OR define("PAY_PAY_ESP", "Pagar");
//USER
defined("USER_TITLE_ESP")       OR define("USER_TITLE_ESP", "Actualizar información");
defined("USER_EXIT_ESP")        OR define("USER_EXIT_ESP", "Salir");
defined("USER_NAME_ESP")        OR define("USER_NAME_ESP", "Nombre");
defined("USER_PHONE_ESP")       OR define("USER_PHONE_ESP", "Teléfono");
defined("USER_ADDRESS_ESP")     OR define("USER_ADDRESS_ESP", "Dirección");
defined("USER_CP_ESP")          OR define("USER_CP_ESP", "CP");
defined("USER_ERROR_ESP")       OR define("USER_ERROR_ESP", "Ingrese todos sus datos");
defined("USER_UPDATE_ESP")      OR define("USER_UPDATE_ESP", "Actualizar");
defined("USER_DATE_ESP")        OR define("USER_DATE_ESP", "Fecha");
defined("USER_BRANCH_ESP")      OR define("USER_BRANCH_ESP", "Sucursal");
defined("USER_PRODUCT_ESP")     OR define("USER_PRODUCT_ESP", "Producto");
defined("USER_PRICE_ESP")       OR define("USER_PRICE_ESP", "Precio");
defined("USER_ADVANCE_ESP")     OR define("USER_ADVANCE_ESP", "Adelanto");
defined("USER_SCHEDULE_PENDING_ESP")OR define("USER_SCHEDULE_PENDING_ESP", "Citas pendientes");
defined("USER_TYPE_SCHEDULE_ESP")OR define("USER_TYPE_SCHEDULE_ESP", "Tipo de cita");
defined("USER_TYPE_RENT_ESP")   OR define("USER_TYPE_RENT_ESP", "Renta");
defined("USER_TYPE_MAKING_ESP") OR define("USER_TYPE_MAKING_ESP", "Confección");

/*INGLES*/
//Menu
defined("TITLE_INFO_ENG") OR define("TITLE_INFO_ENG", "Shipping to all Mexico!");
defined("SEARCH_MENU_ENG") OR define("SEARCH_MENU_ENG", "Search");
defined("SIGN_IN_MENU_ENG") OR define("SIGN_IN_MENU_ENG", "Sign in");
defined("CART_MENU_ENG") OR define("CART_MENU_ENG", "Cart");
defined("MAIN_MENU_ENG") OR define("MAIN_MENU_ENG", "HOME");
defined("DESIGNER_MENU_ENG") OR define("DESIGNER_MENU_ENG", "VALERIA SÁNCHEZ");
defined("CATALOG_MENU_ENG") OR define("CATALOG_MENU_ENG", "CATALOG");
defined("SCHEDULE_MENU_ENG") OR define("SCHEDULE_MENU_ENG", "SCHEDULCE");
defined("SIZE_MENU_ENG") OR define("SIZE_MENU_ENG", "Size");
defined("COLOR_MENU_ENG") OR define("COLOR_MENU_ENG", "Color");
defined("PIECES_MENU_ESP") OR define("PIECES_MENU_ESP", "Pieces");
defined("CONTACT_MENU_ENG") OR define("CONTACT_MENU_ENG", "CONTACT");
defined("FOLLOW_FOOTER_ENG") OR define("FOLLOW_FOOTER_ENG", "Follow us");
//Main
defined("SECCION1_TITLE_MAIN_ENG") OR define("SECCION1_TITLE_MAIN_ENG", "EVERYTHING YOU NEED");
defined("SECCION2_TITLE_MAIN_ENG") OR define("SECCION2_TITLE_MAIN_ENG", "New collection");
defined("SECCION2_SUBTITLE_MAIN_ENG") OR define("SECCION2_SUBTITLE_MAIN_ENG", "Autumn Winter 2022");
defined("SECCION2_TEXT_MAIN_ENG") OR define("SECCION2_TEXT_MAIN_ENG", "Valeria Sánchez is the creator of this boutique that offers a unique experience and personalized attention for each girl. Today her designs have set a trend.");
defined("SECCION2_BUTTON_MAIN_ENG") OR define("SECCION2_BUTTON_MAIN_ENG", "Discover the collection");
defined("SECCION3_TITLE_MAIN_ENG") OR define("SECCION3_TITLE_MAIN_ENG", "SEASON DRESS");
defined("SECCION4_TITLE_MAIN_ENG") OR define("SECCION4_TITLE_MAIN_ENG", "Know us");
defined("SECCION4_SUBTITLE_MAIN_ENG") OR define("SECCION4_SUBTITLE_MAIN_ENG", "Come and fall in love");
defined("SECCION4_TEXT_MAIN_ENG") OR define("SECCION4_TEXT_MAIN_ENG", "Visit any of our branches and let yourself be carried away by our incredible designs that we have for you.");
defined("SECCION4_BUTTON_MAIN_ENG") OR define("SECCION4_BUTTON_MAIN_ENG", "See branches");
defined("SECCION5_TITLE_MAIN_ENG") OR define("SECCION5_TITLE_MAIN_ENG", "EXCLUSIVE DESIGNS");
//Catalog
defined("CATALOG_FILTER_ENG") OR define("CATALOG_FILTER_ENG", "Filter");
defined("CATALOG_ADD_CART_ENG") OR define("CATALOG_ADD_CART_ENG", "Add");
defined("CATALOG_SIZE_ENG") OR define("CATALOG_SIZE_ENG", "Size");
defined("CATALOG_COLOR_ENG") OR define("CATALOG_COLOR_ENG", "Color");
defined("CATALOG_PIECES_ENG") OR define("CATALOG_PIECES_ENG", "Pieces");
defined("CATALOG_TYPE_ENG") OR define("CATALOG_TYPE_ENG", "Type");
defined("CATALOG_BRANCH_ENG") OR define("CATALOG_BRANCH_ENG", "Branch");
defined("CATALOG_PRICE_ENG") OR define("CATALOG_PRICE_ENG", "Price");
//Search
defined("SEARCH_FILTER_ENG") OR define("SEARCH_FILTER_ENG", "What are you looking for?");
defined("SEARCH_SALE_ENG") OR define("SEARCH_SALE_ENG", "Sale");
defined("SEARCH_RENT_ENG") OR define("SEARCH_RENT_ENG", "Rent");
//CAR
defined("CAR_TITLE_ENG") OR define("CAR_TITLE_ENG", "Car");
defined("CAR_SHIPPING_ENG") OR define("CAR_SHIPPING_ENG", "Shipping");
defined("CAR_PAY_ENG") OR define("CAR_PAY_ENG", "Pay");
//CONTACT
defined("SECCION1_TITLE_CONTACT_ENG") OR define("SECCION1_TITLE_CONTACT_ENG", "Contact us");
defined("SECCION1_SUBTITLE_CONTACT_ENG") OR define("SECCION1_SUBTITLE_CONTACT_ENG", "Branch");
defined("SECCION2_TITLE_CONTACT_ENG") OR define("SECCION2_TITLE_CONTACT_ENG", "Get in contact with us");
defined("SECCION3_TITLE_CONTACT_ENG") OR define("SECCION3_TITLE_CONTACT_ENG", "Send us your message");
defined("SECCION3_EMAIL_CONTACT_ENG") OR define("SECCION3_EMAIL_CONTACT_ENG", "your@email.com");
defined("SECCION3_MESSAGE_CONTACT_ENG") OR define("SECCION3_MESSAGE_CONTACT_ENG", "How can we help?");
defined("SECCION3_SEND_CONTACT_ENG") OR define("SECCION3_SEND_CONTACT_ENG", "Send");
//TANKYOUCONTACT
defined("SECCION1_TITLE_TANKYOUCONTACT_ENG") OR define("SECCION1_TITLE_TANKYOUCONTACT_ENG", "Thanks for your preference!");
defined("SECCION1_SUBTITLE_TANKYOUCONTACT_ENG") OR define("SECCION1_SUBTITLE_TANKYOUCONTACT_ENG", "We will contact you shortly");
defined("SECCION1_BUTTON_TANKYOUCONTACT_ENG") OR define("SECCION1_BUTTON_TANKYOUCONTACT_ENG", "Go back");
//LOGIN
defined("SECCION1_TITLE_LOGIN_ENG") OR define("SECCION1_TITLE_LOGIN_ENG", "Log in to your account");
defined("SECCION1_EMAIL_LOGIN_ENG") OR define("SECCION1_EMAIL_LOGIN_ENG", "Email");
defined("SECCION1_PASSWORD_LOGIN_ENG") OR define("SECCION1_PASSWORD_LOGIN_ENG", "Password");
defined("SECCION1_ERROR_LOGIN_ENG") OR define("SECCION1_ERROR_LOGIN_ENG", "Enter your email and password");
defined("SECCION1_USER_NOT_VALID_LOGIN_ENG") OR define("SECCION1_USER_NOT_VALID_LOGIN_ENG", "The username or password does not exist in the system");
defined("SECCION1_BUTTON_LOGIN_ENG") OR define("SECCION1_BUTTON_LOGIN_ENG", "Sign in");
defined("SECCION1_NO_ACCOUNT_LOGIN_ENG") OR define("SECCION1_NO_ACCOUNT_LOGIN_ENG", "Create an account");
//ACCOUNT
defined("SECCION1_TITLE_ACCOUNT_ENG") OR define("SECCION1_TITLE_ACCOUNT_ENG", "Create an account");
defined("SECCION1_SUBTITLE_ACCOUNT_ENG") OR define("SECCION1_SUBTITLE_ACCOUNT_ENG", "Already have an account?");
defined("SECCION1_NAME_ACCOUNT_ENG") OR define("SECCION1_NAME_ACCOUNT_ENG", "Name");
defined("SECCION1_EMAIL_ACCOUNT_ENG") OR define("SECCION1_EMAIL_ACCOUNT_ENG", "Email");
defined("SECCION1_PASSWORD_ACCOUNT_ENG") OR define("SECCION1_PASSWORD_ACCOUNT_ENG", "Password");
defined("SECCION1_MIN_PASSWORD_ACCOUNT_ENG") OR define("SECCION1_MIN_PASSWORD_ACCOUNT_ENG", "Enter a password of at least 8 characters");
defined("SECCION1_CONFIRM_PASSWORD_ACCOUNT_ENG") OR define("SECCION1_CONFIRM_PASSWORD_ACCOUNT_ENG", "Confirm password");
defined("SECCION1_PHONE_ACCOUNT_ENG") OR define("SECCION1_PHONE_ACCOUNT_ENG", "Phone");
defined("SECCION1_ADDRESS_ACCOUNT_ENG") OR define("SECCION1_ADDRESS_ACCOUNT_ENG", "Address");
defined("SECCION1_CP_ACCOUNT_ENG") OR define("SECCION1_CP_ACCOUNT_ENG", "CP");
defined("SECCION1_ERROR_ACCOUNT_ENG") OR define("SECCION1_ERROR_ACCOUNT_ENG", "Enter all your information and confirm your event date");
defined("SECCION1_USER_NOT_VALID_ACCOUNT_ENG") OR define("SECCION1_USER_NOT_VALID_ACCOUNT_ENG", "The user is already registered in the system");
defined("SECCION1_BUTTON_ACCOUNT_ENG") OR define("SECCION1_BUTTON_ACCOUNT_ENG", "Save");
//SCHEDULE
defined("SECCION1_TITLE_SCHEDULE_ENG") OR define("SECCION1_TITLE_SCHEDULE_ENG", "Schedule with us");
defined("SECCION1_NAME_SCHEDULE_ENG") OR define("SECCION1_NAME_SCHEDULE_ENG", "Name");
defined("SECCION1_PHONE_SCHEDULE_ENG") OR define("SECCION1_PHONE_SCHEDULE_ENG", "Phone");
defined("SECCION1_BRANCH_SCHEDULE_ENG") OR define("SECCION1_BRANCH_SCHEDULE_ENG", "Branch");
defined("SECCION1_ADDRESS_PROOF_SCHEDULE_ENG") OR define("SECCION1_ADDRESS_PROOF_SCHEDULE_ENG", "Proof of address");
defined("SECCION1_TYPE_SCHEDULE_SCHEDULE_ENG") OR define("SECCION1_TYPE_SCHEDULE_SCHEDULE_ENG", "Appointment type");
defined("SECCION1_TEXT_TYPE_SCHEDULE_SCHEDULE_ENG") OR define("SECCION1_TEXT_TYPE_SCHEDULE_SCHEDULE_ENG", "Select the type of appointment");
defined("SECCION1_TEXT_RENT_TYPE_SCHEDULE_SCHEDULE_ENG") OR define("SECCION1_TEXT_RENT_TYPE_SCHEDULE_SCHEDULE_ENG", "Rent");
defined("SECCION1_TEXT_SALE_TYPE_SCHEDULE_SCHEDULE_ENG") OR define("SECCION1_TEXT_SALE_TYPE_SCHEDULE_SCHEDULE_ENG", "Sale");
defined("SECCION1_TEXT_MAKING_TYPE_SCHEDULE_SCHEDULE_ENG") OR define("SECCION1_TEXT_MAKING_TYPE_SCHEDULE_SCHEDULE_ENG", "Making");
defined("SECCION1_EVENT_DATE_SCHEDULE_ENG") OR define("SECCION1_EVENT_DATE_SCHEDULE_ENG", "Event date");
defined("SECCION1_DATE_DELIVERY_SCHEDULE_ENG") OR define("SECCION1_DATE_DELIVERY_SCHEDULE_ENG", "Date of delivery");
defined("SECCION1_TEXT_SELECT_BRANCH_SCHEDULE_ENG") OR define("SECCION1_TEXT_SELECT_BRANCH_SCHEDULE_ENG", "Select the branch");
defined("SECCION1_HOUR_SCHEDULE_ENG") OR define("SECCION1_HOUR_SCHEDULE_ENG", "Hour");
defined("SECCION1_MODEL_SCHEDULE_ENG") OR define("SECCION1_MODEL_SCHEDULE_ENG", "Model");
defined("SECCION1_TEXT_SELECT_MODEL_SCHEDULE_ENG") OR define("SECCION1_TEXT_SELECT_MODEL_SCHEDULE_ENG", "Select the model");
defined("SECCION1_TEXT_HOUR_SCHEDULE_ENG") OR define("SECCION1_TEXT_HOUR_SCHEDULE_ENG", "Select the schedule");
defined("SECCION1_CHECK_EVENT_SCHEDULE_ENG") OR define("SECCION1_CHECK_EVENT_SCHEDULE_ENG", "Is your event date correct?");
defined("SECCION1_COLOR_SCHEDULE_ENG") OR define("SECCION1_COLOR_SCHEDULE_ENG", "Color");
defined("SECCION1_SIZE_SCHEDULE_ENG") OR define("SECCION1_SIZE_SCHEDULE_ENG", "Size");
defined("SECCION1_INE_SCHEDULE_ENG") OR define("SECCION1_INE_SCHEDULE_ENG", "ID");
defined("SECCION1_ADVANCE_SCHEDULE_ENG") OR define("SECCION1_ADVANCE_SCHEDULE_ENG", "Charge for separation");
defined("SECCION1_MESSAGE_NOT_AVAILABLE_SCHEDULE_ENG") OR define("SECCION1_MESSAGE_NOT_AVAILABLE_SCHEDULE_ENG", "Product not available on this date");
defined("SECCION1_TEXT_SIZE_SCHEDULE_ENG") OR define("SECCION1_TEXT_SIZE_SCHEDULE_ENG", "Select the size");
defined("SECCION1_TEXT_COLOR_SCHEDULE_ENG") OR define("SECCION1_TEXT_COLOR_SCHEDULE_ENG", "Select the color");
defined("SECCION1_AGE_SCHEDULE_ENG") OR define("SECCION1_AGE_SCHEDULE_ENG", "Age");
defined("SECCION1_PRICE_RANGE_SCHEDULE_ENG") OR define("SECCION1_PRICE_RANGE_SCHEDULE_ENG", "Price range");
defined("SECCION1_BUTTON_SCHEDULE_ENG") OR define("SECCION1_BUTTON_SCHEDULE_ENG", "Schedule");
defined("SECCION1_MESSAGE_SCHEDULE_ENG") OR define("SECCION1_MESSAGE_SCHEDULE_ENG", "You need to log in to schedule an appointment");
defined("SECCION1_MESSAGE_ERROR_CP_SCHEDULE_ENG") OR define("SECCION1_MESSAGE_ERROR_CP_SCHEDULE_ENG", "Sorry, at the moment your address cannot participate in the rental of products.");
defined("SECCION1_MESSAGE_DOUBTS_SCHEDULE_ENG") OR define("SECCION1_MESSAGE_DOUBTS_SCHEDULE_ENG", "For doubts or clarifications you can communicate via Whatsapp to the following telephone numbers");
//Product
defined("PRODUCT_ADD_CART_ENG") OR define("PRODUCT_ADD_CART_ENG", "Add");
defined("PRODUCT_SIZE_ENG") OR define("PRODUCT_SIZE_ENG", "Size");
defined("PRODUCT_COLOR_ENG") OR define("PRODUCT_COLOR_ENG", "Color");
defined("PRODUCT_PIECES_ENG") OR define("PRODUCT_PIECES_ENG", "Pieces");
defined("PRODUCT_DESCRIPTION_ENG") OR define("PRODUCT_DESCRIPTION_ENG", "Description");
//Pay
defined("PAY_TITLE_ENG") OR define("PAY_TITLE_ENG", "Payment method");
defined("PAY_NAME_ENG") OR define("PAY_NAME_ENG", "Name");
defined("PAY_CARD_NUMBER_ENG") OR define("PAY_CARD_NUMBER_ENG", "Card Number");
defined("PAY_EXPIRY_DATE_ENG") OR define("PAY_EXPIRY_DATE_ENG", "Expiry Date");
defined("PAY_PAY_ENG") OR define("PAY_PAY_ENG", "Pay");
//USER
defined("USER_TITLE_ENG")       OR define("USER_TITLE_ENG", "Update information");
defined("USER_EXIT_ENG")        OR define("USER_EXIT_ENG", "Exit");
defined("USER_NAME_ENG")        OR define("USER_NAME_ENG", "Name");
defined("USER_PHONE_ENG")       OR define("USER_PHONE_ENG", "Phone");
defined("USER_ADDRESS_ENG")     OR define("USER_ADDRESS_ENG", "Address");
defined("USER_CP_ENG")          OR define("USER_CP_ENG", "CP");
defined("USER_ERROR_ENG")       OR define("USER_ERROR_ENG", "Enter all your information");
defined("USER_UPDATE_ENG")      OR define("USER_UPDATE_ENG", "Update");
defined("USER_DATE_ENG")        OR define("USER_DATE_ENG", "Date");
defined("USER_BRANCH_ENG")      OR define("USER_BRANCH_ENG", "Branch");
defined("USER_PRODUCT_ENG")     OR define("USER_PRODUCT_ENG", "Product");
defined("USER_PRICE_ENG")       OR define("USER_PRICE_ENG", "Price");
defined("USER_ADVANCE_ENG")     OR define("USER_ADVANCE_ENG", "Advance");
defined("USER_SCHEDULE_PENDING_ENG")OR define("USER_SCHEDULE_PENDING_ENG", "Schedule pending");
defined("USER_TYPE_SCHEDULE_ENG")OR define("USER_TYPE_SCHEDULE_ENG", "Type schedule");
defined("USER_TYPE_RENT_ENG")   OR define("USER_TYPE_RENT_ENG", "Rent");
defined("USER_TYPE_MAKING_ENG") OR define("USER_TYPE_MAKING_ENG", "Making");
?>
