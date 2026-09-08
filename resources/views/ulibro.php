<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ulibro | Venta de libros</title>
    <style>
        :root {
            --primary: #2f6fed;
            --accent: #f4b942;
            --dark: #1f2937;
            --light: #f8fafc;
            --soft: #e2e8f0;
        }

        .app_name {
            color: var(--primary);
            font-weight: 700;
        }

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: linear-gradient(to bottom, #eef5ff, #ffffff);
            color: var(--dark);
        }

        a {
            text-decoration: none;
            color: inherit;
        }

        .container {
            width: min(1100px, 90%);
            margin: 0 auto;
        }

        header {
            background: #fff;
            border-bottom: 1px solid var(--soft);
            position: sticky;
            top: 0;
            z-index: 10;
        }

        .nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 18px 0;
        }

        .logo {
            font-size: 1.8rem;
            font-weight: 700;
            color: var(--primary);
        }

        .nav-links {
            display: flex;
            gap: 24px;
            font-weight: 600;
            color: var(--dark);
        }

        .btn {
            display: inline-block;
            padding: 12px 24px;
            border-radius: 999px;
            font-weight: 700;
            transition: 0.3s ease;
        }

        .btn-primary {
            background: var(--primary);
            color: #fff;
        }

        .btn-primary:hover {
            background: #2359d8;
        }

        .hero {
            padding: 80px 0 50px;
        }

        .hero-content {
            display: grid;
            grid-template-columns: 1.2fr 0.8fr;
            align-items: center;
            gap: 40px;
        }

        .hero h1 {
            font-size: clamp(2.5rem, 5vw, 4.2rem);
            line-height: 1.1;
            margin: 0 0 18px;
        }

        .hero p {
            font-size: 1.1rem;
            line-height: 1.7;
            color: #475569;
            margin-bottom: 28px;
        }

        .hero-actions {
            display: flex;
            gap: 16px;
            align-items: center;
            flex-wrap: wrap;
        }

        .btn-secondary {
            background: #f1f5f9;
            color: var(--dark);
        }

        .stats {
            display: flex;
            gap: 28px;
            margin-top: 30px;
            flex-wrap: wrap;
        }

        .stat {
            min-width: 120px;
        }

        .stat strong {
            display: block;
            font-size: 1.6rem;
            color: var(--primary);
        }

        .book-showcase {
            background: linear-gradient(135deg, #dfeaff, #f3f8ff);
            border-radius: 28px;
            padding: 26px;
            box-shadow: 0 20px 45px rgba(47, 111, 237, 0.12);
        }

        .book-cover {
            background: linear-gradient(135deg, #1d4ed8, #7c3aed);
            border-radius: 22px;
            height: 430px;
            position: relative;
            overflow: hidden;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
        }

        .book-cover::before {
            content: "";
            position: absolute;
            inset: 18px;
            border: 2px solid rgba(255,255,255,0.35);
            border-radius: 18px;
        }

        .book-text {
            position: relative;
            z-index: 1;
            text-align: center;
            padding: 20px;
        }

        .book-text h3 {
            font-size: 2.2rem;
            margin: 0 0 10px;
        }

        .book-text p {
            font-size: 1rem;
            margin: 0;
            letter-spacing: 0.15em;
            text-transform: uppercase;
            opacity: 0.9;
        }

        .popular {
            padding: 30px 0 70px;
        }

        .section-header {
            text-align: center;
            margin-bottom: 30px;
        }

        .section-header h2 {
            font-size: clamp(2rem, 3vw, 2.8rem);
            margin-bottom: 12px;
        }

        .section-header p {
            color: #64748b;
            margin: 0;
        }

        .books-grid {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 24px;
        }

        .book-card {
            background: white;
            border: 1px solid var(--soft);
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 12px 28px rgba(15, 23, 42, 0.05);
        }

        .mini-cover {
            height: 220px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
            color: white;
            font-size: 1.6rem;
        }

        .cover-1 { background: linear-gradient(135deg, #f59e0b, #ef4444); }
        .cover-2 { background: linear-gradient(135deg, #10b981, #0ea5e9); }
        .cover-3 { background: linear-gradient(135deg, #8b5cf6, #ec4899); }

        .book-info {
            padding: 22px 20px 26px;
        }

        .book-info h3 {
            margin: 0 0 8px;
            font-size: 1.4rem;
        }

        .book-info p {
            margin: 0 0 14px;
            color: #64748b;
            line-height: 1.6;
        }

        .price-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .price {
            font-size: 1.5rem;
            font-weight: 800;
            color: var(--dark);
        }

        .features {
            background: #0f172a;
            color: white;
            padding: 80px 0;
        }

        .feature-grid {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 24px;
            margin-top: 36px;
        }

        .feature-box {
            background: rgba(255,255,255,0.04);
            border: 1px solid rgba(255,255,255,0.08);
            border-radius: 18px;
            padding: 26px 20px;
        }

        .feature-box h3 {
            margin-top: 0;
            margin-bottom: 12px;
            font-size: 1.3rem;
        }

        .feature-box p {
            margin: 0;
            color: #cbd5e1;
            line-height: 1.7;
        }

        .cta {
            padding: 80px 0;
            text-align: center;
        }

        .cta-box {
            background: linear-gradient(135deg, var(--primary), #7c3aed);
            color: white;
            border-radius: 24px;
            padding: 54px 30px;
        }

        .cta-box h2 {
            margin: 0 0 14px;
            font-size: clamp(2rem, 3vw, 3rem);
        }

        .cta-box p {
            margin: 0 auto 24px;
            max-width: 700px;
            line-height: 1.7;
            opacity: 0.95;
        }

        footer {
            background: #020817;
            color: #cbd5e1;
            padding: 28px 0;
            text-align: center;
        }

        @media (max-width: 820px) {
            .hero-content,
            .books-grid,
            .feature-grid {
                grid-template-columns: 1fr;
            }

            .nav {
                flex-direction: column;
                gap: 14px;
            }

            .nav-links {
                flex-wrap: wrap;
                justify-content: center;
            }
        }
    </style>
</head>
<body>
    <header>
        <div class="container nav">
            <div class="logo"><span class="app_name">Ulibro</span></div>
            <nav class="nav-links">
                <a href="#inicio">Inicio</a>
                <a href="#catalogo">Catálogo</a>
                <a href="#beneficios">Beneficios</a>
                <a href="#contacto">Contacto</a>
            </nav>
            <a class="btn btn-primary" href="#catalogo">Comprar ahora</a>
        </div>
    </header>

    <main id="inicio">
        <section class="hero">
            <div class="container hero-content">
                <div>
                    <h1>Descubre historias que transforman tu día.</h1>
                    <p>
                        En <span class="app_name">Ulibro</span> encontrarás novelas, clásicos, temas de autoayuda y libros para todas las edades,
                        con una experiencia de compra rápida, cómoda y llena de inspiración.
                    </p>
                    <div class="hero-actions">
                        <a class="btn btn-primary" href="#catalogo">Ver catálogo</a>
                        <a class="btn btn-secondary" href="#beneficios">¿Por qué elegirnos?</a>
                    </div>
                    <div class="stats">
                        <div class="stat">
                            <strong>+12k</strong>
                            <span>lectores felices</span>
                        </div>
                        <div class="stat">
                            <strong>4.9/5</strong>
                            <span>calificación</span>
                        </div>
                        <div class="stat">
                            <strong>24h</strong>
                            <span>envío rápido</span>
                        </div>
                    </div>
                </div>

                <div class="book-showcase">
                    <div class="book-cover">
                        <div class="book-text">
                            <h3>La lectura<br>te cambia</h3>
                            <p>nueva colección</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="popular" id="catalogo">
            <div class="container">
                <div class="section-header">
                    <h2>Libros más vendidos</h2>
                    <p>Explora nuestras recomendaciones del mes.</p>
                </div>

                <div class="books-grid">
                    <article class="book-card">
                        <div class="mini-cover cover-1">Ficción</div>
                        <div class="book-info">
                            <h3>El jardín secreto</h3>
                            <p>Una historia cautivadora sobre descubrimiento, esperanza y nueva vida.</p>
                            <div class="price-row">
                                <span class="price">$29.99</span>
                                <a class="btn btn-primary" href="#contacto">Comprar</a>
                            </div>
                        </div>
                    </article>

                    <article class="book-card">
                        <div class="mini-cover cover-2">Crecimiento</div>
                        <div class="book-info">
                            <h3>Hábitos poderosos</h3>
                            <p>Aprende a crear rutinas sencillas que te ayuden a lograr tus metas.</p>
                            <div class="price-row">
                                <span class="price">$34.99</span>
                                <a class="btn btn-primary" href="#contacto">Comprar</a>
                            </div>
                        </div>
                    </article>

                    <article class="book-card">
                        <div class="mini-cover cover-3">Clásicos</div>
                        <div class="book-info">
                            <h3>El principito</h3>
                            <p>Una lectura atemporal llena de sensibilidad, imaginación y reflexión.</p>
                            <div class="price-row">
                                <span class="price">$24.99</span>
                                <a class="btn btn-primary" href="#contacto">Comprar</a>
                            </div>
                        </div>
                    </article>
                </div>
            </div>
        </section>

        <section class="features" id="beneficios">
            <div class="container">
                <div class="section-header">
                    <h2 style="color:white;">¿Por qué comprar en <span class="app_name">Ulibro</span>?</h2>
                </div>

                <div class="feature-grid">
                    <div class="feature-box">
                        <h3>Envío rápido</h3>
                        <p>Recibe tus libros en pocos días con servicio seguro y confiable.</p>
                    </div>
                    <div class="feature-box">
                        <h3>Precios accesibles</h3>
                        <p>Ofertas y promociones en títulos destacados para todos los gustos.</p>
                    </div>
                    <div class="feature-box">
                        <h3>Selección cuidada</h3>
                        <p>Editoriales, clásicos y nuevas publicaciones seleccionadas por expertos.</p>
                    </div>
                </div>
            </div>
        </section>

        <section class="cta" id="contacto">
            <div class="container">
                <div class="cta-box">
                    <h2>Empieza hoy mismo tu próxima aventura literaria</h2>
                    <p>Accede a promociones exclusivas y descubre nuevos títulos que te acompañarán en cada momento.</p>
                    <a class="btn btn-secondary" href="mailto:ventas@ulibro.com">ventas@ulibro.com</a>
                </div>
            </div>
        </section>
    </main>

    <footer>
        <div class="container">© 2026 <span class="app_name">Ulibro</span>. Todos los derechos reservados.</div>
    </footer>
</body>
</html>
