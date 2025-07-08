
import { Header } from "@/components/Header";
import { Footer } from "@/components/Footer";
import { Button } from "@/components/ui/button";
import { Badge } from "@/components/ui/badge";
import { Card, CardContent } from "@/components/ui/card";
import { Star, ShoppingCart, Heart, Minus, Plus, Truck, Shield, RefreshCw } from "lucide-react";
import { useState } from "react";
import { useParams, useNavigate } from "react-router-dom";
import { useToast } from "@/hooks/use-toast";

const ProductDetail = () => {
  const { id } = useParams();
  const navigate = useNavigate();
  const { toast } = useToast();
  const [quantity, setQuantity] = useState(1);
  const [isLiked, setIsLiked] = useState(false);

  // Mock product data - in real app this would come from API
  const allProducts = [
    {
      id: 1,
      name: "Premium Wireless Headphones",
      price: 299,
      originalPrice: 399,
      rating: 4.8,
      reviews: 124,
      image: "bg-gradient-to-br from-slate-200 to-slate-300",
      category: "electronics",
      badge: "Best Seller",
      description: "Experience premium sound quality with these wireless headphones featuring active noise cancellation, 30-hour battery life, and premium materials.",
      features: ["Active Noise Cancellation", "30-hour Battery Life", "Premium Materials", "Bluetooth 5.0", "Quick Charge"],
      inStock: true,
      stockCount: 15
    },
    {
      id: 2,
      name: "Smart Fitness Watch",
      price: 249,
      originalPrice: 329,
      rating: 4.9,
      reviews: 89,
      image: "bg-gradient-to-br from-blue-200 to-blue-300",
      category: "electronics",
      badge: "New",
      description: "Track your fitness goals with this advanced smartwatch featuring heart rate monitoring, GPS, and 7-day battery life.",
      features: ["Heart Rate Monitor", "GPS Tracking", "7-day Battery", "Water Resistant", "Sleep Tracking"],
      inStock: true,
      stockCount: 8
    },
    {
      id: 3,
      name: "Designer Cotton T-Shirt",
      price: 49,
      originalPrice: 69,
      rating: 4.6,
      reviews: 156,
      image: "bg-gradient-to-br from-green-200 to-green-300",
      category: "fashion",
      badge: "Sale",
      description: "Premium cotton t-shirt with modern fit and sustainable materials. Perfect for casual wear.",
      features: ["100% Organic Cotton", "Modern Fit", "Sustainable Materials", "Pre-shrunk", "Machine Washable"],
      inStock: true,
      stockCount: 25
    },
    {
      id: 4,
      name: "Professional Camera Lens",
      price: 599,
      originalPrice: 749,
      rating: 4.9,
      reviews: 203,
      image: "bg-gradient-to-br from-gray-200 to-gray-300",
      category: "electronics",
      badge: "Pro",
      description: "Professional grade camera lens with superior optics and weather sealing for photography enthusiasts.",
      features: ["Weather Sealed", "Superior Optics", "Image Stabilization", "Fast Autofocus", "Professional Grade"],
      inStock: true,
      stockCount: 5
    },
    {
      id: 5,
      name: "Luxury Sunglasses",
      price: 189,
      originalPrice: 249,
      rating: 4.6,
      reviews: 78,
      image: "bg-gradient-to-br from-rose-200 to-rose-300",
      category: "fashion",
      badge: "Trending",
      description: "Designer sunglasses with UV protection and premium frame materials for style and comfort.",
      features: ["UV Protection", "Premium Frame", "Polarized Lenses", "Designer Style", "Comfortable Fit"],
      inStock: true,
      stockCount: 12
    },
    {
      id: 6,
      name: "Modern Table Lamp",
      price: 89,
      originalPrice: 119,
      rating: 4.7,
      reviews: 92,
      image: "bg-gradient-to-br from-yellow-200 to-yellow-300",
      category: "home",
      badge: "Popular",
      description: "Modern LED table lamp with adjustable brightness and sleek design perfect for any room.",
      features: ["LED Technology", "Adjustable Brightness", "Modern Design", "Energy Efficient", "Touch Control"],
      inStock: true,
      stockCount: 18
    }
  ];

  const product = allProducts.find(p => p.id === parseInt(id || "0"));

  if (!product) {
    return (
      <div className="min-h-screen bg-gradient-to-br from-slate-50 to-blue-50">
        <Header />
        <div className="container mx-auto px-4 py-16 text-center">
          <h1 className="text-2xl font-bold text-gray-900 mb-4">Product Not Found</h1>
          <Button onClick={() => navigate("/products")}>Back to Products</Button>
        </div>
        <Footer />
      </div>
    );
  }

  const handleAddToCart = () => {
    toast({
      title: "Added to Cart",
      description: `${quantity} ${product.name} added to your cart`,
    });
  };

  return (
    <div className="min-h-screen bg-gradient-to-br from-slate-50 to-blue-50">
      <Header />
      <div className="container mx-auto px-4 py-8">
        <Button 
          variant="ghost" 
          onClick={() => navigate(-1)}
          className="mb-6"
        >
          ← Back
        </Button>

        <div className="grid grid-cols-1 lg:grid-cols-2 gap-12">
          {/* Product Image */}
          <div className="space-y-4">
            <div className={`aspect-square ${product.image} rounded-lg relative overflow-hidden`}>
              <Badge className="absolute top-4 left-4 bg-blue-500 text-white border-0">
                {product.badge}
              </Badge>
              <Button
                variant="ghost"
                size="sm"
                className={`absolute top-4 right-4 h-10 w-10 rounded-full bg-white/90 hover:bg-white transition-colors ${
                  isLiked ? 'text-red-500' : 'text-gray-600'
                }`}
                onClick={() => setIsLiked(!isLiked)}
              >
                <Heart className={`h-5 w-5 ${isLiked ? 'fill-current' : ''}`} />
              </Button>
            </div>
          </div>

          {/* Product Info */}
          <div className="space-y-6">
            <div>
              <h1 className="text-3xl font-bold text-gray-900 mb-2">{product.name}</h1>
              <div className="flex items-center space-x-4 mb-4">
                <div className="flex items-center">
                  {[...Array(5)].map((_, i) => (
                    <Star 
                      key={i} 
                      className={`h-5 w-5 ${
                        i < Math.floor(product.rating) 
                          ? 'fill-yellow-400 text-yellow-400' 
                          : 'text-gray-300'
                      }`} 
                    />
                  ))}
                </div>
                <span className="text-gray-600">({product.reviews} reviews)</span>
              </div>
            </div>

            <div className="flex items-center space-x-4">
              <span className="text-4xl font-bold text-gray-900">${product.price}</span>
              <span className="text-2xl text-gray-500 line-through">${product.originalPrice}</span>
              <Badge variant="outline" className="text-green-600 border-green-200">
                Save ${product.originalPrice - product.price}
              </Badge>
            </div>

            <p className="text-gray-600 text-lg leading-relaxed">{product.description}</p>

            {/* Features */}
            <div>
              <h3 className="font-semibold text-lg mb-3">Key Features</h3>
              <ul className="space-y-2">
                {product.features.map((feature, index) => (
                  <li key={index} className="flex items-center space-x-2">
                    <div className="w-2 h-2 bg-blue-500 rounded-full"></div>
                    <span className="text-gray-700">{feature}</span>
                  </li>
                ))}
              </ul>
            </div>

            {/* Quantity and Add to Cart */}
            <div className="space-y-4">
              <div className="flex items-center space-x-4">
                <span className="font-medium">Quantity:</span>
                <div className="flex items-center border rounded-lg">
                  <Button
                    variant="ghost"
                    size="sm"
                    onClick={() => setQuantity(Math.max(1, quantity - 1))}
                    className="h-10 w-10"
                  >
                    <Minus className="h-4 w-4" />
                  </Button>
                  <span className="px-4 py-2 font-medium">{quantity}</span>
                  <Button
                    variant="ghost"
                    size="sm"
                    onClick={() => setQuantity(quantity + 1)}
                    className="h-10 w-10"
                  >
                    <Plus className="h-4 w-4" />
                  </Button>
                </div>
              </div>

              <div className="flex space-x-4">
                <Button 
                  onClick={handleAddToCart}
                  className="flex-1 bg-gradient-to-r from-blue-600 to-purple-600 hover:from-blue-700 hover:to-purple-700 text-white h-12"
                >
                  <ShoppingCart className="mr-2 h-5 w-5" />
                  Add to Cart
                </Button>
                <Button variant="outline" className="h-12 px-6">
                  Buy Now
                </Button>
              </div>
            </div>

            {/* Additional Info */}
            <div className="grid grid-cols-1 md:grid-cols-3 gap-4 pt-6 border-t">
              <div className="flex items-center space-x-2">
                <Truck className="h-5 w-5 text-blue-500" />
                <span className="text-sm text-gray-600">Free Shipping</span>
              </div>
              <div className="flex items-center space-x-2">
                <Shield className="h-5 w-5 text-green-500" />
                <span className="text-sm text-gray-600">2 Year Warranty</span>
              </div>
              <div className="flex items-center space-x-2">
                <RefreshCw className="h-5 w-5 text-purple-500" />
                <span className="text-sm text-gray-600">30 Day Returns</span>
              </div>
            </div>
          </div>
        </div>
      </div>
      <Footer />
    </div>
  );
};

export default ProductDetail;
