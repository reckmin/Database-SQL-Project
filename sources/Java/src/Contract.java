public class Contract {
    private String contract_name;
    private float contract_price;
    private int customer_id;
    private int provider_id;

    public Contract(String contract_name, float contract_price, int customer_id, int provider_id){
        this.contract_name=contract_name;
        this.contract_price=contract_price;
        this.customer_id= customer_id;
        this.provider_id = provider_id;
    }

    public String getContract_name() {
        return contract_name;
    }

    public float getContract_price() {
        return contract_price;
    }

    public int getCustomer_id() {
        return customer_id;
    }

    public int getProvider_id() {
        return provider_id;
    }

    @Override
    public String toString(){
        return "Contract: "+ contract_name + ", " + contract_price + ", "+ customer_id + ", " + provider_id ;
    }

}
