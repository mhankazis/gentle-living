
import { Button } from "@/components/ui/button";
import { Input } from "@/components/ui/input";
import { Mail, Gift } from "lucide-react";

export const Newsletter = () => {
  return (
    <section className="py-20 bg-gradient-to-r from-blue-600 to-purple-600">
      <div className="container mx-auto px-4">
        <div className="max-w-4xl mx-auto text-center text-white">
          <div className="flex justify-center mb-6">
            <div className="w-16 h-16 bg-white/20 rounded-full flex items-center justify-center">
              <Mail className="h-8 w-8" />
            </div>
          </div>
          
          <h2 className="text-4xl font-bold mb-4">Stay in the Loop</h2>
          <p className="text-xl mb-8 opacity-90">
            Get exclusive deals, new product launches, and insider tips delivered straight to your inbox
          </p>

          <div className="flex flex-col sm:flex-row gap-4 max-w-md mx-auto mb-8">
            <Input 
              type="email" 
              placeholder="Enter your email address" 
              className="bg-white/10 border-white/30 text-white placeholder:text-white/70 focus:bg-white/20"
            />
            <Button className="bg-white text-blue-600 hover:bg-gray-100 px-8">
              Subscribe
            </Button>
          </div>

          <div className="flex items-center justify-center space-x-2 text-sm opacity-80">
            <Gift className="h-4 w-4" />
            <span>Get 15% off your first order when you subscribe</span>
          </div>
        </div>
      </div>
    </section>
  );
};
