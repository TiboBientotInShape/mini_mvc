<div style="max-width: 400px; margin: 40px auto; padding: 20px; border: 1px solid #ddd; border-radius: 8px; box-shadow: 0 2px 10px rgba(0,0,0,0.1);">
    <h2 style="text-align: center; color: #333;">Se connecter</h2>

    <form action="/login" method="POST">
        <div style="margin-bottom: 15px;">
            <label style="font-weight: bold;">Email :</label>
            <input type="email" name="email" required style="width: 100%; padding: 8px; margin-top: 5px; border: 1px solid #ccc; border-radius: 4px;">
        </div>

        <div style="margin-bottom: 20px;">
            <label style="font-weight: bold;">Mot de passe :</label>
            <input type="password" name="password" required style="width: 100%; padding: 8px; margin-top: 5px; border: 1px solid #ccc; border-radius: 4px;">
        </div>

        <button type="submit" style="width: 100%; padding: 12px; background: #28a745; color: white; border: none; font-size: 16px; border-radius: 4px; cursor: pointer;">
            Connexion
        </button>
    </form>
    
    <p style="margin-top: 15px; text-align: center;">
        Pas encore de compte ? <a href="/register" style="color: #007bff; text-decoration: none;">Créer un compte</a>
    </p>
</div>