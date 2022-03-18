<main>
    <section class="contact">
        <h1>Contact</h1>
        <p>
            Lorem, ipsum dolor sit amet consectetur adipisicing elit. Temporibus, quia odio quibusdam quod consequuntur tempore cum perferendis sit explicabo
        </p>
        
        <form action="page/traitement.php" method="POST">
            <fieldset>
                <legend>Hire me</legend>
                <?php echo $message ?>
                <div class="form__control">
                    <label for="name">Name</label>
                    <input type="text" name="name" placeholder="name">
                </div>                            
                <div class="form__control">
                    <label for="email">Email</label>
                    <input type="text" placeholder="email" name="email">
                </div>
                <div class="form__control">
                    <label for="message">Message</label>
                    <textarea name="message" row="5" cols="30"></textarea> 
                </div>
                <input type="submit" name="submit-form">
            </fieldset>
        </form>
    </section>
</main>