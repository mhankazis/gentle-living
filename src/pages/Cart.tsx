
import { Header } from "@/components/Header";
import { Footer } from "@/components/Footer";
import { CartItems } from "@/components/CartItems";
import { CartSummary } from "@/components/CartSummary";

const Cart = () => {
  return (
    <div className="min-h-screen bg-gradient-to-br from-slate-50 to-blue-50">
      <Header />
      <div className="container mx-auto px-4 py-8">
        <h1 className="text-4xl font-bold text-gray-900 mb-8 text-center">Shopping Cart</h1>
        <div className="grid lg:grid-cols-3 gap-8">
          <div className="lg:col-span-2">
            <CartItems />
          </div>
          <div className="lg:col-span-1">
            <CartSummary />
          </div>
        </div>
      </div>
      <Footer />
    </div>
  );
};

export default Cart;
