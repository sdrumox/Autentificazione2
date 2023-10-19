// src/Controller/SecurityController.php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class SecurityController extends AbstractController
{
/**
* @Route("/login", name="login")
*/
public function login(AuthenticationUtils $authenticationUtils)
{
// get the login error if there is one
$error = $authenticationUtils->getLastAuthenticationError();

// last username entered by the user
$lastUsername = $authenticationUtils->getLastUsername();

return $this->render('security/login.html.twig', [
'last_username' => $lastUsername,
'error' => $error,
]);
}

/**
* @Route("/dashboard", name="dashboard")
*/
public function dashboard()
{
// Implement logic for accessing the dashboard after successful login
$this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');

return $this->render('security/dashboard.html.twig');
}
}
