import installationImage from 'figma:asset/d45c4aeaca8fc9f422b306735091731fb835e7d1.png';

export function InstallationEffect() {
  return (
    <section className="py-12 sm:py-16 md:py-20 bg-black">
      <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div className="text-center mb-10 sm:mb-12 md:mb-16">
          <h2 className="text-3xl sm:text-4xl md:text-5xl font-bold text-white mb-3 sm:mb-4 px-4">
            Stunning Visual Impact
          </h2>
          <p className="text-base sm:text-lg md:text-xl text-gray-400 px-4">
            See the dramatic transformation these lights bring to your vehicle
          </p>
        </div>

        <div className="relative mb-8 sm:mb-10 md:mb-12">
          <img 
            src={installationImage} 
            alt="Installation Effect" 
            className="w-full max-w-5xl mx-auto rounded-xl sm:rounded-2xl shadow-2xl"
          />
          
          {/* Gradient overlay for extra effect */}
          <div className="absolute inset-0 bg-gradient-to-t from-black via-transparent to-transparent pointer-events-none rounded-xl sm:rounded-2xl"></div>
        </div>

        <div className="mt-8 sm:mt-10 md:mt-12 grid sm:grid-cols-2 md:grid-cols-3 gap-6 sm:gap-7 md:gap-8 max-w-4xl mx-auto">
          <div className="text-center">
            <div className="w-14 h-14 sm:w-16 sm:h-16 bg-gradient-to-br from-cyan-500 to-blue-500 rounded-full mx-auto mb-3 sm:mb-4 flex items-center justify-center">
              <span className="text-xl sm:text-2xl">🌈</span>
            </div>
            <h3 className="text-base sm:text-lg font-bold text-white mb-1 sm:mb-2">16 Million Colors</h3>
            <p className="text-gray-400 text-xs sm:text-sm px-2">Choose from endless color combinations</p>
          </div>
          
          <div className="text-center">
            <div className="w-14 h-14 sm:w-16 sm:h-16 bg-gradient-to-br from-purple-500 to-pink-500 rounded-full mx-auto mb-3 sm:mb-4 flex items-center justify-center">
              <span className="text-xl sm:text-2xl">✨</span>
            </div>
            <h3 className="text-base sm:text-lg font-bold text-white mb-1 sm:mb-2">Multiple Modes</h3>
            <p className="text-gray-400 text-xs sm:text-sm px-2">Static, flash, fade, and music sync</p>
          </div>
          
          <div className="text-center sm:col-span-2 md:col-span-1">
            <div className="w-14 h-14 sm:w-16 sm:h-16 bg-gradient-to-br from-green-500 to-cyan-500 rounded-full mx-auto mb-3 sm:mb-4 flex items-center justify-center">
              <span className="text-xl sm:text-2xl">📱</span>
            </div>
            <h3 className="text-base sm:text-lg font-bold text-white mb-1 sm:mb-2">App Control</h3>
            <p className="text-gray-400 text-xs sm:text-sm px-2">Full control from your smartphone</p>
          </div>
        </div>
      </div>
    </section>
  );
}