<div style="max-width: 400px; margin: 40px auto; padding: 20px; border: 1px solid #ddd; border-radius: 8px;">
    <h2 style="text-align: center;">Créer un compte Client</h2>

    <form action="/register" method="POST">
        <div style="margin-bottom: 15px;">
            <label>Nom :</label>
            <input type="text" name="nom" required style="width: 100%;">
        </div>

        <div style="margin-bottom: 15px;">
            <label>Prénom :</label>
            <input type="text" name="prenom" required style="width: 100%;">
        </div>

        <div style="margin-bottom: 15px;">
            <label>Adresse :</label>
            <input type="text" name="adresse" required style="width: 100%;">
        </div>

        <div style="margin-bottom: 15px;">
            <label>Email :</label>
            <input type="email" name="email" required style="width: 100%;">
        </div>

        <div style="margin-bottom: 20px;">
            <label>Mot de passe :</label>
            <input type="password" name="password" required style="width: 100%;">
        </div>

        <button type="submit" style="width: 100%; padding: 10px; background: #007bff; color: white; border: none; cursor: pointer;">
            S'inscrire
        </button>
    </form>
</div>