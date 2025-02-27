$subscriptionForm = new Rebilly\Entities\Subscription();
$subscriptionForm->setCustomerId('customerId');
$subscriptionForm->setWebsiteId('websiteId');
$subscriptionForm->setItems($subscriptionForm->createItems([
    'planId' => 'my-plan',
    'quantity' => 1,
]));
$subscriptionForm->setBillingAddress([
    'firstName' => 'John',
    'lastName' => 'Doe',
    'organization' => 'Test LTD',
    'address' => 'Test street 5',
    'address2' => 'Test house 5',
    'city' => 'New York',
    'region' => 'Long Island',
    'country' => 'US',
    'postalCode' => '123456',
    'emails' => [
        [
            'label' => 'main',
            'value' => 'johndoe@testemail.com',
            'primary' => true,
        ],
        [
            'label' => 'secondary',
            'value' => 'otheremail@testemail.com',
        ],
    ],
    'phoneNumbers' => [
        [
            'label' => 'work',
            'value' => '+123456789',
            'primary' => true,
        ],
        [
            'label' => 'home',
            'value' => '+9874654321',
        ],
    ],
]);

try {
    $subscription = $client->subscriptions()->update('subscriptionId', $subscriptionForm);
} catch (Rebilly\Http\Exception\DataValidationException $e) {
    print_r($e->getValidationErrors());
}
