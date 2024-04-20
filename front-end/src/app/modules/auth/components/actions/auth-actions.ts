export async function createAccount(formData: FormData) {
    const name = formData.get('name');
    const email = formData.get('email');
    const password = formData.get('password');

    try {
        const response = await fetch('http://localhost:8000/api/create-account', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({ name, email, password }),
        });

        if (response.ok) {
            const data = await response.json();
            console.log('Conta criada com sucesso:', data);
        } else {
            const errorData = await response.json();
            console.error('Erro ao criar conta:', errorData.error);
        }
    } catch (error) {
        console.error('Erro ao processar a solicitação:', error);
    }
}
