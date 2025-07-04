
import { Header } from "@/components/Header";
import { Footer } from "@/components/Footer";
import { Button } from "@/components/ui/button";
import { Card, CardContent } from "@/components/ui/card";
import { Badge } from "@/components/ui/badge";
import { 
  Shield, 
  Truck, 
  Clock, 
  Star, 
  Users, 
  Award,
  Heart,
  Globe
} from "lucide-react";

const About = () => {
  const features = [
    {
      icon: Shield,
      title: "Secure Shopping",
      description: "Your data and transactions are protected with enterprise-level security"
    },
    {
      icon: Truck,
      title: "Fast Delivery",
      description: "Free shipping on orders over $50 with express delivery options"
    },
    {
      icon: Clock,
      title: "24/7 Support",
      description: "Round-the-clock customer service to help you anytime"
    },
    {
      icon: Star,
      title: "Quality Guarantee",
      description: "All products come with our satisfaction guarantee"
    }
  ];

  const stats = [
    { icon: Users, number: "1M+", label: "Happy Customers" },
    { icon: Award, number: "500K+", label: "Products Sold" },
    { icon: Globe, number: "50+", label: "Countries Served" },
    { icon: Heart, number: "99%", label: "Satisfaction Rate" }
  ];

  return (
    <div className="min-h-screen bg-gradient-to-br from-slate-50 to-blue-50">
      <Header />
      
      {/* Hero Section */}
      <section className="py-20 bg-gradient-to-r from-blue-600 to-purple-600 text-white">
        <div className="container mx-auto px-4 text-center">
          <h1 className="text-5xl font-bold mb-6">About EliteShop</h1>
          <p className="text-xl max-w-3xl mx-auto leading-relaxed">
            We're more than just an e-commerce platform. We're your trusted partner in 
            discovering quality products that enhance your lifestyle and bring joy to your everyday moments.
          </p>
        </div>
      </section>

      {/* Story Section */}
      <section className="py-20">
        <div className="container mx-auto px-4">
          <div className="grid lg:grid-cols-2 gap-12 items-center">
            <div>
              <Badge className="mb-4 bg-blue-100 text-blue-600">Our Story</Badge>
              <h2 className="text-4xl font-bold text-gray-900 mb-6">
                Building Tomorrow's Shopping Experience
              </h2>
              <p className="text-lg text-gray-600 mb-6 leading-relaxed">
                Founded in 2020, EliteShop emerged from a simple vision: to create an online 
                shopping experience that combines convenience, quality, and exceptional service. 
                What started as a small team's dream has grown into a platform trusted by millions.
              </p>
              <p className="text-lg text-gray-600 mb-8 leading-relaxed">
                We believe that shopping should be more than just a transaction. It should be 
                an experience that delights, inspires, and connects people with products they love.
              </p>
              <Button size="lg" className="bg-gradient-to-r from-blue-600 to-purple-600">
                Join Our Journey
              </Button>
            </div>
            <div className="bg-gradient-to-r from-blue-100 to-purple-100 rounded-2xl p-8 h-96 flex items-center justify-center">
              <div className="text-center">
                <div className="w-24 h-24 bg-gradient-to-r from-blue-600 to-purple-600 rounded-full mx-auto mb-4 flex items-center justify-center">
                  <Heart className="h-12 w-12 text-white" />
                </div>
                <p className="text-lg font-semibold text-gray-700">Made with passion</p>
              </div>
            </div>
          </div>
        </div>
      </section>

      {/* Features Section */}
      <section className="py-20 bg-white/50">
        <div className="container mx-auto px-4">
          <div className="text-center mb-16">
            <h2 className="text-4xl font-bold text-gray-900 mb-4">Why Choose EliteShop?</h2>
            <p className="text-xl text-gray-600 max-w-2xl mx-auto">
              We're committed to providing you with the best shopping experience possible
            </p>
          </div>

          <div className="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
            {features.map((feature, index) => {
              const IconComponent = feature.icon;
              return (
                <Card key={index} className="text-center hover:shadow-lg transition-shadow duration-300">
                  <CardContent className="p-8">
                    <div className="w-16 h-16 bg-gradient-to-r from-blue-600 to-purple-600 rounded-full flex items-center justify-center mx-auto mb-4">
                      <IconComponent className="h-8 w-8 text-white" />
                    </div>
                    <h3 className="text-xl font-semibold text-gray-900 mb-3">{feature.title}</h3>
                    <p className="text-gray-600 leading-relaxed">{feature.description}</p>
                  </CardContent>
                </Card>
              );
            })}
          </div>
        </div>
      </section>

      {/* Stats Section */}
      <section className="py-20">
        <div className="container mx-auto px-4">
          <div className="text-center mb-16">
            <h2 className="text-4xl font-bold text-gray-900 mb-4">Our Impact</h2>
            <p className="text-xl text-gray-600">Numbers that tell our story</p>
          </div>

          <div className="grid grid-cols-2 lg:grid-cols-4 gap-8">
            {stats.map((stat, index) => {
              const IconComponent = stat.icon;
              return (
                <div key={index} className="text-center">
                  <div className="w-16 h-16 bg-gradient-to-r from-blue-600 to-purple-600 rounded-full flex items-center justify-center mx-auto mb-4">
                    <IconComponent className="h-8 w-8 text-white" />
                  </div>
                  <div className="text-4xl font-bold text-gray-900 mb-2">{stat.number}</div>
                  <div className="text-gray-600 font-medium">{stat.label}</div>
                </div>
              );
            })}
          </div>
        </div>
      </section>

      {/* CTA Section */}
      <section className="py-20 bg-gradient-to-r from-blue-600 to-purple-600 text-white">
        <div className="container mx-auto px-4 text-center">
          <h2 className="text-4xl font-bold mb-6">Ready to Start Shopping?</h2>
          <p className="text-xl mb-8 max-w-2xl mx-auto">
            Join millions of satisfied customers and discover your next favorite product today.
          </p>
          <Button size="lg" className="bg-white text-blue-600 hover:bg-gray-100">
            Start Shopping Now
          </Button>
        </div>
      </section>

      <Footer />
    </div>
  );
};

export default About;
