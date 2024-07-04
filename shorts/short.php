<?php
    session_start();

    include_once('config.php');

    if (isset($_SESSION['url'])) {
        # code...
    }else{
        header('Location: index');
    }
?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Free URL Shortener</title>
        <link rel="shortcut icon" href="./favicon/favicon.ico" type="image/x-icon" />
        <link rel="apple-touch-icon" href="./favicon/apple-touch-icon.png" />
        <link rel="apple-touch-icon" sizes="57x57" href="./favicon/apple-touch-icon-57x57.png" />
        <link rel="apple-touch-icon" sizes="72x72" href="./favicon/apple-touch-icon-72x72.png" />
        <link rel="apple-touch-icon" sizes="76x76" href="./favicon/apple-touch-icon-76x76.png" />
        <link rel="apple-touch-icon" sizes="114x114" href="./favicon/apple-touch-icon-114x114.png" />
        <link rel="apple-touch-icon" sizes="120x120" href="./favicon/apple-touch-icon-120x120.png" />
        <link rel="apple-touch-icon" sizes="144x144" href="./favicon/apple-touch-icon-144x144.png" />
        <link rel="apple-touch-icon" sizes="152x152" href="./favicon/apple-touch-icon-152x152.png" />
        <link rel="apple-touch-icon" sizes="180x180" href="./favicon/apple-touch-icon-180x180.png" />
        <meta name="description" content="Srty is a tool to shorten a long link and create a short URL easy to share on sites, chat and emails. Track short URL traffic and manage your links.">
        <meta property="og:title" content="URL Shortener">
        <meta property="og:url" content="https://www.srty.xyz/">
        <meta property="og:type" content="website">
        <meta property="og:image" content="https://www.shorturl.at/favicon/76x76">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <link rel="stylesheet" href="assets/css/style.css">
    </head>
    <body>
 
        <!--Navbar Start-->

        <nav class="domain mb-4 py-1 shadow-sm bg-white text-center overflow-hidden">
            <div class="row d-flex justify-content-center align-items-center">
                <div class="col-md-12 text-center">
                    <div class="logo-inner">
                        <span class="logo">#</span>&nbsp;&nbsp;<span class="hi">Shortener</span>
                    </div>
                </div>
            </div>
        </nav>

        <!--Header Start-->

        <header class="domain text-center">
            <h1>Your shortened URL</h1>
        </header>

        <!--Main Content Start-->

        <main class="container shortener mb-3">
            <div class="row d-flex justify-content-center align-items-center">
                <div class="col-md-12">
                    <div class="row d-flex justify-content-center align-items-center">
                        <div class="col-md-10">
                            <div class="card border-0 rounded-0 py-4">
                                <div class="row g-3 d-flex justify-content-center align-items-center">
                                    <div class="col-md-12 col-11 text-center">
                                        <span class="">
                                            Paste the URL to be shortened
                                        </span>
                                    </div>
                                    <div class="col-md-10 col-11 text-center">
                                        <form class="text-center" action="" method="post">
                                            <div class="input-group copy-link">
                                                <input type="text" name="url" value="<?php echo $base_url.$_SESSION['url']; ?>" class="form-control copy-link-input rounded-0 py-3" placeholder="Please Enter the link" aria-label="Please Enter the link" aria-describedby="basic-addon2" readonly required>
                                                <button type="submit" name="submit" class="input-group-text copy-link-button btn btn-short py-3 rounded-0 fw-500" id="basic-addon2">Copy URL</button>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="col-md-10 px-4 text-center">
                                        <p class="fw-medium">
                                            <span>Your Long Url : </span> <?php echo $_SESSION['link']; ?>
                                        </p>
                                    </div>
                                    <div class="col-md-10 text-center">
                                        <a class="btn btn-short fw-500" href="index">Srty another link</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>

        <!--Footer Start-->

        <footer class="w-100 bg-white py-2 text-center footer overflow-hidden position-absolute bottom-0">
            <div class="row">
                <div class="col-md-12">
                    <div class="footer-inner">
                        <span class="logo">#</span>&nbsp;<span class="hi">Shortener</span>
                    </div>
                </div>
                <div class="col-md-12">
                    <span class="copyright">
                        Copyright © Srty.xyz .All rights reserved 2024
                    </span>
                </div>
                <div class="col-md-12">
                    <p>
                    Developed By <a class="text-decoration-none " target="_blank" href="https://www.linkedin.com/in/swapnaliyadav18">Swapnali Yadav</a>
                    </p>
                </div>
            </div>
        </footer>
        
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <?php
           

            if (isset($_SESSION["text"]) && $_SESSION["text"]) {
                ?>
                <script>
                    swal.fire({
                        icon: "<?php echo $_SESSION['icon']; ?>",
                        title: "<?php echo $_SESSION['text']; ?>",
                        showConfirmButton: false,
                        timer: 2000
                    });
                </script>
        <?php
            unset($_SESSION['text']);
            }

        ?>

        <script>
            document.querySelectorAll(".copy-link").forEach(copyLinkContainer =>{
                const inputfield=copyLinkContainer.querySelector(".copy-link-input");
                const copybutton=copyLinkContainer.querySelector(".copy-link-button");

                inputfield.addEventListener("focus", ()=> inputfield.select());

                copybutton.addEventListener('click', ()=>{
                    const text=inputfield.value;

                    inputfield.select();
                    navigator.clipboard.writeText(text);

                    inputfield.value="Copied!";
                    setTimeout(()=>inputfield.value=text, 10000);
                });
            });
        </script>
        
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/js/all.min.js" integrity="sha512-u3fPA7V8qQmhBPNT5quvaXVa1mnnLSXUep5PS1qo5NRzHwG19aHmNJnj1Q8hpA/nBWZtZD4r4AX6YOt5ynLN2g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    </body>
</html>