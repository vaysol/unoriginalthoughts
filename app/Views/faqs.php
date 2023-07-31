<section class="policies">
    <div class="main-policies">
        <div class="all-policy-text">
            <h4>FAQs</h4>
            <p>
                <b>How long will my order take?</b></br>
                All orders usually get shipped within 5-7 working days. So you can expect a
                delivery between 7-10 days.
                You will get a tracking link in your inbox as soon as your order is shipped</br>
            </p>
            <p>
                <b>What should I do if I have received only a part of my order?</b></br>
                We make sure that all the products are sent to you in one package. In case
                there's something missing kindly mail us at
                <?= ( isset( $dataJSON["contact_information"]["email"] ) )? "<a href='mailto:" . $dataJSON["contact_information"]["email"] . "'>" . $dataJSON["contact_information"]["email"] . "</a>" : ""  ?>.<br>
            </p>
            <h4>RETURN/EXCHANGE:</h4>
            <p>
                <b>I received a damaged product. What do I do?</b></br>
                Please do not worry. Drop us a mail at
                <?= ( isset( $dataJSON["contact_information"]["email"] ) )? "<a href='mailto:" . $dataJSON["contact_information"]["email"] . "'>" . $dataJSON["contact_information"]["email"] . "</a>" : ""  ?>
                with images
                of the damaged product within 7 days of receiving the order. We will check and
                have the product replaced or refund your money whichever is preferred.
                Complete amount will be refunded and it can reflect in your account in 7-10
                business days from the refund processed date.</br>
            </p>
            <p>
                <b>What do I do if I don't like the product I received?</b></br>
                Drop us a mail and you could just ship the product back to us to the address
                which will be given in the mail. But please note that the products purchased can
                be returned (unopened / unused without damage and with all the tags intact)
                within 7 days of receiving the order.
                Please make sure that the return product is packed well to avoid any damages in
                transit.
                The courier charges incurred by you to send us back the product will not be
                refunded.
            </p>
            <p>
                <b>My tracking link shows 'delivered' but I have not received the package. What do I do?</b></br>
                Please drop us a mail at
                <?= ( isset( $dataJSON["contact_information"]["email"] ) )? "<a href='mailto:" . $dataJSON["contact_information"]["email"] . "'>" . $dataJSON["contact_information"]["email"] . "</a>" : ""  ?>
                within 24 hrs of the delivery mentioned in the tracking link. We shall check with the courier service.
            </p>

            <h4>CANCELLATION:</h4>
            <p>
                <b>How can i cancel my order?</b></br>
                Please mail us at
                <?= ( isset( $dataJSON["contact_information"]["email"] ) )? "<a href='mailto:" . $dataJSON["contact_information"]["email"] . "'>" . $dataJSON["contact_information"]["email"] . "</a>" : ""  ?>
                for cancellation request if your order has not been shipped yet.
            </p>
            <p>
                <b>When can I cancel my order?</b></br>
                Orders can be cancelled only if it has not been shipped from our warehouse. No cancellation applicable
                for customised products once the order is placed.
            </p>
            <p>
                <b>Can I cancel my order once the product has been shipped?</b></br>
                Unfortunately, we cannot cancel orders once the shipment is out of our store for delivery.
                Once shipped, we will not consider cancellation requests.
            </p>
            <p>
                <b>When do I get my refund for the cancelled order?</b></br>
                If the payment was by credit/ debit card or net-banking, the money will be refunded to your credit/
                debit card or net-banking account, respectively. Typically, refunds are processed between 7- 12 working
                days.
            </p>
            <h4>Thank you!</h4>
        </div>
    </div>
</section>