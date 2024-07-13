<?php

declare(strict_types=1);

namespace PHPOS\Architecture\Operation\x86_64;

use PHPOS\Architecture\Operation\MnemonicInterface;
use PHPOS\Architecture\Operation\OperationCollection;
use PHPOS\Architecture\Operation\OperationType;
use PHPOS\Architecture\Operation\x86_64\Entities\Jmp;

/**
 * @see https://www.felixcloutier.com/x86/
 */
enum Mnemonic: string implements MnemonicInterface
{
    case AAA = \PHPOS\Architecture\Operation\x86_64\Entities\Aaa::class;
    case AAD = \PHPOS\Architecture\Operation\x86_64\Entities\Aad::class;
    case AAM = \PHPOS\Architecture\Operation\x86_64\Entities\Aam::class;
    case AAS = \PHPOS\Architecture\Operation\x86_64\Entities\Aas::class;
    case ADC = \PHPOS\Architecture\Operation\x86_64\Entities\Adc::class;
    case ADCX = \PHPOS\Architecture\Operation\x86_64\Entities\Adcx::class;
    case ADD = \PHPOS\Architecture\Operation\x86_64\Entities\Add::class;
    case ADDPD = \PHPOS\Architecture\Operation\x86_64\Entities\Addpd::class;
    case ADDPS = \PHPOS\Architecture\Operation\x86_64\Entities\Addps::class;
    case ADDSD = \PHPOS\Architecture\Operation\x86_64\Entities\Addsd::class;
    case ADDSS = \PHPOS\Architecture\Operation\x86_64\Entities\Addss::class;
    case ADDSUBPD = \PHPOS\Architecture\Operation\x86_64\Entities\Addsubpd::class;
    case ADDSUBPS = \PHPOS\Architecture\Operation\x86_64\Entities\Addsubps::class;
    case ADOX = \PHPOS\Architecture\Operation\x86_64\Entities\Adox::class;
    case AESDEC = \PHPOS\Architecture\Operation\x86_64\Entities\Aesdec::class;
    case AESDEC128KL = \PHPOS\Architecture\Operation\x86_64\Entities\Aesdec128kl::class;
    case AESDEC256KL = \PHPOS\Architecture\Operation\x86_64\Entities\Aesdec256kl::class;
    case AESDECLAST = \PHPOS\Architecture\Operation\x86_64\Entities\Aesdeclast::class;
    case AESDECWIDE128KL = \PHPOS\Architecture\Operation\x86_64\Entities\Aesdecwide128kl::class;
    case AESDECWIDE256KL = \PHPOS\Architecture\Operation\x86_64\Entities\Aesdecwide256kl::class;
    case AESENC = \PHPOS\Architecture\Operation\x86_64\Entities\Aesenc::class;
    case AESENC128KL = \PHPOS\Architecture\Operation\x86_64\Entities\Aesenc128kl::class;
    case AESENC256KL = \PHPOS\Architecture\Operation\x86_64\Entities\Aesenc256kl::class;
    case AESENCLAST = \PHPOS\Architecture\Operation\x86_64\Entities\Aesenclast::class;
    case AESENCWIDE128KL = \PHPOS\Architecture\Operation\x86_64\Entities\Aesencwide128kl::class;
    case AESENCWIDE256KL = \PHPOS\Architecture\Operation\x86_64\Entities\Aesencwide256kl::class;
    case AESIMC = \PHPOS\Architecture\Operation\x86_64\Entities\Aesimc::class;
    case AESKEYGENASSIST = \PHPOS\Architecture\Operation\x86_64\Entities\Aeskeygenassist::class;
    case AND_ = \PHPOS\Architecture\Operation\x86_64\Entities\And_::class;
    case ANDN = \PHPOS\Architecture\Operation\x86_64\Entities\Andn::class;
    case ANDNPD = \PHPOS\Architecture\Operation\x86_64\Entities\Andnpd::class;
    case ANDNPS = \PHPOS\Architecture\Operation\x86_64\Entities\Andnps::class;
    case ANDPD = \PHPOS\Architecture\Operation\x86_64\Entities\Andpd::class;
    case ANDPS = \PHPOS\Architecture\Operation\x86_64\Entities\Andps::class;
    case ARPL = \PHPOS\Architecture\Operation\x86_64\Entities\Arpl::class;
    case BEXTR = \PHPOS\Architecture\Operation\x86_64\Entities\Bextr::class;
    case BLENDPD = \PHPOS\Architecture\Operation\x86_64\Entities\Blendpd::class;
    case BLENDPS = \PHPOS\Architecture\Operation\x86_64\Entities\Blendps::class;
    case BLENDVPD = \PHPOS\Architecture\Operation\x86_64\Entities\Blendvpd::class;
    case BLENDVPS = \PHPOS\Architecture\Operation\x86_64\Entities\Blendvps::class;
    case BLSI = \PHPOS\Architecture\Operation\x86_64\Entities\Blsi::class;
    case BLSMSK = \PHPOS\Architecture\Operation\x86_64\Entities\Blsmsk::class;
    case BLSR = \PHPOS\Architecture\Operation\x86_64\Entities\Blsr::class;
    case BNDCL = \PHPOS\Architecture\Operation\x86_64\Entities\Bndcl::class;
    case BNDCN = \PHPOS\Architecture\Operation\x86_64\Entities\Bndcn::class;
    case BNDCU = \PHPOS\Architecture\Operation\x86_64\Entities\Bndcu::class;
    case BNDLDX = \PHPOS\Architecture\Operation\x86_64\Entities\Bndldx::class;
    case BNDMK = \PHPOS\Architecture\Operation\x86_64\Entities\Bndmk::class;
    case BNDMOV = \PHPOS\Architecture\Operation\x86_64\Entities\Bndmov::class;
    case BNDSTX = \PHPOS\Architecture\Operation\x86_64\Entities\Bndstx::class;
    case BOUND = \PHPOS\Architecture\Operation\x86_64\Entities\Bound::class;
    case BSF = \PHPOS\Architecture\Operation\x86_64\Entities\Bsf::class;
    case BSR = \PHPOS\Architecture\Operation\x86_64\Entities\Bsr::class;
    case BSWAP = \PHPOS\Architecture\Operation\x86_64\Entities\Bswap::class;
    case BT = \PHPOS\Architecture\Operation\x86_64\Entities\Bt::class;
    case BTC = \PHPOS\Architecture\Operation\x86_64\Entities\Btc::class;
    case BTR = \PHPOS\Architecture\Operation\x86_64\Entities\Btr::class;
    case BTS = \PHPOS\Architecture\Operation\x86_64\Entities\Bts::class;
    case BZHI = \PHPOS\Architecture\Operation\x86_64\Entities\Bzhi::class;
    case CALL = \PHPOS\Architecture\Operation\x86_64\Entities\Call::class;
    case CBW = \PHPOS\Architecture\Operation\x86_64\Entities\Cbw::class;
    case CDQ = \PHPOS\Architecture\Operation\x86_64\Entities\Cdq::class;
    case CDQE = \PHPOS\Architecture\Operation\x86_64\Entities\Cdqe::class;
    case CLAC = \PHPOS\Architecture\Operation\x86_64\Entities\Clac::class;
    case CLC = \PHPOS\Architecture\Operation\x86_64\Entities\Clc::class;
    case CLD = \PHPOS\Architecture\Operation\x86_64\Entities\Cld::class;
    case CLDEMOTE = \PHPOS\Architecture\Operation\x86_64\Entities\Cldemote::class;
    case CLFLUSH = \PHPOS\Architecture\Operation\x86_64\Entities\Clflush::class;
    case CLFLUSHOPT = \PHPOS\Architecture\Operation\x86_64\Entities\Clflushopt::class;
    case CLI = \PHPOS\Architecture\Operation\x86_64\Entities\Cli::class;
    case CLRSSBSY = \PHPOS\Architecture\Operation\x86_64\Entities\Clrssbsy::class;
    case CLTS = \PHPOS\Architecture\Operation\x86_64\Entities\Clts::class;
    case CLUI = \PHPOS\Architecture\Operation\x86_64\Entities\Clui::class;
    case CLWB = \PHPOS\Architecture\Operation\x86_64\Entities\Clwb::class;
    case CMC = \PHPOS\Architecture\Operation\x86_64\Entities\Cmc::class;
    case CMOVCC = \PHPOS\Architecture\Operation\x86_64\Entities\Cmovcc::class;
    case CMP = \PHPOS\Architecture\Operation\x86_64\Entities\Cmp::class;
    case CMPPD = \PHPOS\Architecture\Operation\x86_64\Entities\Cmppd::class;
    case CMPPS = \PHPOS\Architecture\Operation\x86_64\Entities\Cmpps::class;
    case CMPS = \PHPOS\Architecture\Operation\x86_64\Entities\Cmps::class;
    case CMPSB = \PHPOS\Architecture\Operation\x86_64\Entities\Cmpsb::class;
    case CMPSD = \PHPOS\Architecture\Operation\x86_64\Entities\Cmpsd::class;
    case CMPSQ = \PHPOS\Architecture\Operation\x86_64\Entities\Cmpsq::class;
    case CMPSS = \PHPOS\Architecture\Operation\x86_64\Entities\Cmpss::class;
    case CMPSW = \PHPOS\Architecture\Operation\x86_64\Entities\Cmpsw::class;
    case CMPXCHG = \PHPOS\Architecture\Operation\x86_64\Entities\Cmpxchg::class;
    case CMPXCHG16B = \PHPOS\Architecture\Operation\x86_64\Entities\Cmpxchg16b::class;
    case CMPXCHG8B = \PHPOS\Architecture\Operation\x86_64\Entities\Cmpxchg8b::class;
    case COMISD = \PHPOS\Architecture\Operation\x86_64\Entities\Comisd::class;
    case COMISS = \PHPOS\Architecture\Operation\x86_64\Entities\Comiss::class;
    case CPUID = \PHPOS\Architecture\Operation\x86_64\Entities\Cpuid::class;
    case CQO = \PHPOS\Architecture\Operation\x86_64\Entities\Cqo::class;
    case CRC32 = \PHPOS\Architecture\Operation\x86_64\Entities\Crc32::class;
    case CVTDQ2PD = \PHPOS\Architecture\Operation\x86_64\Entities\Cvtdq2pd::class;
    case CVTDQ2PS = \PHPOS\Architecture\Operation\x86_64\Entities\Cvtdq2ps::class;
    case CVTPD2DQ = \PHPOS\Architecture\Operation\x86_64\Entities\Cvtpd2dq::class;
    case CVTPD2PI = \PHPOS\Architecture\Operation\x86_64\Entities\Cvtpd2pi::class;
    case CVTPD2PS = \PHPOS\Architecture\Operation\x86_64\Entities\Cvtpd2ps::class;
    case CVTPI2PD = \PHPOS\Architecture\Operation\x86_64\Entities\Cvtpi2pd::class;
    case CVTPI2PS = \PHPOS\Architecture\Operation\x86_64\Entities\Cvtpi2ps::class;
    case CVTPS2DQ = \PHPOS\Architecture\Operation\x86_64\Entities\Cvtps2dq::class;
    case CVTPS2PD = \PHPOS\Architecture\Operation\x86_64\Entities\Cvtps2pd::class;
    case CVTPS2PI = \PHPOS\Architecture\Operation\x86_64\Entities\Cvtps2pi::class;
    case CVTSD2SI = \PHPOS\Architecture\Operation\x86_64\Entities\Cvtsd2si::class;
    case CVTSD2SS = \PHPOS\Architecture\Operation\x86_64\Entities\Cvtsd2ss::class;
    case CVTSI2SD = \PHPOS\Architecture\Operation\x86_64\Entities\Cvtsi2sd::class;
    case CVTSI2SS = \PHPOS\Architecture\Operation\x86_64\Entities\Cvtsi2ss::class;
    case CVTSS2SD = \PHPOS\Architecture\Operation\x86_64\Entities\Cvtss2sd::class;
    case CVTSS2SI = \PHPOS\Architecture\Operation\x86_64\Entities\Cvtss2si::class;
    case CVTTPD2DQ = \PHPOS\Architecture\Operation\x86_64\Entities\Cvttpd2dq::class;
    case CVTTPD2PI = \PHPOS\Architecture\Operation\x86_64\Entities\Cvttpd2pi::class;
    case CVTTPS2DQ = \PHPOS\Architecture\Operation\x86_64\Entities\Cvttps2dq::class;
    case CVTTPS2PI = \PHPOS\Architecture\Operation\x86_64\Entities\Cvttps2pi::class;
    case CVTTSD2SI = \PHPOS\Architecture\Operation\x86_64\Entities\Cvttsd2si::class;
    case CVTTSS2SI = \PHPOS\Architecture\Operation\x86_64\Entities\Cvttss2si::class;
    case CWD = \PHPOS\Architecture\Operation\x86_64\Entities\Cwd::class;
    case CWDE = \PHPOS\Architecture\Operation\x86_64\Entities\Cwde::class;
    case DAA = \PHPOS\Architecture\Operation\x86_64\Entities\Daa::class;
    case DAS = \PHPOS\Architecture\Operation\x86_64\Entities\Das::class;
    case DEC = \PHPOS\Architecture\Operation\x86_64\Entities\Dec::class;
    case DIV = \PHPOS\Architecture\Operation\x86_64\Entities\Div::class;
    case DIVPD = \PHPOS\Architecture\Operation\x86_64\Entities\Divpd::class;
    case DIVPS = \PHPOS\Architecture\Operation\x86_64\Entities\Divps::class;
    case DIVSD = \PHPOS\Architecture\Operation\x86_64\Entities\Divsd::class;
    case DIVSS = \PHPOS\Architecture\Operation\x86_64\Entities\Divss::class;
    case DPPD = \PHPOS\Architecture\Operation\x86_64\Entities\Dppd::class;
    case DPPS = \PHPOS\Architecture\Operation\x86_64\Entities\Dpps::class;
    case EMMS = \PHPOS\Architecture\Operation\x86_64\Entities\Emms::class;
    case ENCODEKEY128 = \PHPOS\Architecture\Operation\x86_64\Entities\Encodekey128::class;
    case ENCODEKEY256 = \PHPOS\Architecture\Operation\x86_64\Entities\Encodekey256::class;
    case ENDBR32 = \PHPOS\Architecture\Operation\x86_64\Entities\Endbr32::class;
    case ENDBR64 = \PHPOS\Architecture\Operation\x86_64\Entities\Endbr64::class;
    case ENQCMD = \PHPOS\Architecture\Operation\x86_64\Entities\Enqcmd::class;
    case ENQCMDS = \PHPOS\Architecture\Operation\x86_64\Entities\Enqcmds::class;
    case ENTER = \PHPOS\Architecture\Operation\x86_64\Entities\Enter::class;
    case EXTRACTPS = \PHPOS\Architecture\Operation\x86_64\Entities\Extractps::class;
    case F2XM1 = \PHPOS\Architecture\Operation\x86_64\Entities\F2xm1::class;
    case FABS = \PHPOS\Architecture\Operation\x86_64\Entities\Fabs::class;
    case FADD = \PHPOS\Architecture\Operation\x86_64\Entities\Fadd::class;
    case FADDP = \PHPOS\Architecture\Operation\x86_64\Entities\Faddp::class;
    case FBLD = \PHPOS\Architecture\Operation\x86_64\Entities\Fbld::class;
    case FBSTP = \PHPOS\Architecture\Operation\x86_64\Entities\Fbstp::class;
    case FCHS = \PHPOS\Architecture\Operation\x86_64\Entities\Fchs::class;
    case FCLEX = \PHPOS\Architecture\Operation\x86_64\Entities\Fclex::class;
    case FCMOVCC = \PHPOS\Architecture\Operation\x86_64\Entities\Fcmovcc::class;
    case FCOM = \PHPOS\Architecture\Operation\x86_64\Entities\Fcom::class;
    case FCOMI = \PHPOS\Architecture\Operation\x86_64\Entities\Fcomi::class;
    case FCOMIP = \PHPOS\Architecture\Operation\x86_64\Entities\Fcomip::class;
    case FCOMP = \PHPOS\Architecture\Operation\x86_64\Entities\Fcomp::class;
    case FCOMPP = \PHPOS\Architecture\Operation\x86_64\Entities\Fcompp::class;
    case FCOS = \PHPOS\Architecture\Operation\x86_64\Entities\Fcos::class;
    case FDECSTP = \PHPOS\Architecture\Operation\x86_64\Entities\Fdecstp::class;
    case FDIV = \PHPOS\Architecture\Operation\x86_64\Entities\Fdiv::class;
    case FDIVP = \PHPOS\Architecture\Operation\x86_64\Entities\Fdivp::class;
    case FDIVR = \PHPOS\Architecture\Operation\x86_64\Entities\Fdivr::class;
    case FDIVRP = \PHPOS\Architecture\Operation\x86_64\Entities\Fdivrp::class;
    case FFREE = \PHPOS\Architecture\Operation\x86_64\Entities\Ffree::class;
    case FIADD = \PHPOS\Architecture\Operation\x86_64\Entities\Fiadd::class;
    case FICOM = \PHPOS\Architecture\Operation\x86_64\Entities\Ficom::class;
    case FICOMP = \PHPOS\Architecture\Operation\x86_64\Entities\Ficomp::class;
    case FIDIV = \PHPOS\Architecture\Operation\x86_64\Entities\Fidiv::class;
    case FIDIVR = \PHPOS\Architecture\Operation\x86_64\Entities\Fidivr::class;
    case FILD = \PHPOS\Architecture\Operation\x86_64\Entities\Fild::class;
    case FIMUL = \PHPOS\Architecture\Operation\x86_64\Entities\Fimul::class;
    case FINCSTP = \PHPOS\Architecture\Operation\x86_64\Entities\Fincstp::class;
    case FINIT = \PHPOS\Architecture\Operation\x86_64\Entities\Finit::class;
    case FIST = \PHPOS\Architecture\Operation\x86_64\Entities\Fist::class;
    case FISTP = \PHPOS\Architecture\Operation\x86_64\Entities\Fistp::class;
    case FISTTP = \PHPOS\Architecture\Operation\x86_64\Entities\Fisttp::class;
    case FISUB = \PHPOS\Architecture\Operation\x86_64\Entities\Fisub::class;
    case FISUBR = \PHPOS\Architecture\Operation\x86_64\Entities\Fisubr::class;
    case FLD = \PHPOS\Architecture\Operation\x86_64\Entities\Fld::class;
    case FLD1 = \PHPOS\Architecture\Operation\x86_64\Entities\Fld1::class;
    case FLDCW = \PHPOS\Architecture\Operation\x86_64\Entities\Fldcw::class;
    case FLDENV = \PHPOS\Architecture\Operation\x86_64\Entities\Fldenv::class;
    case FLDL2E = \PHPOS\Architecture\Operation\x86_64\Entities\Fldl2e::class;
    case FLDL2T = \PHPOS\Architecture\Operation\x86_64\Entities\Fldl2t::class;
    case FLDLG2 = \PHPOS\Architecture\Operation\x86_64\Entities\Fldlg2::class;
    case FLDLN2 = \PHPOS\Architecture\Operation\x86_64\Entities\Fldln2::class;
    case FLDPI = \PHPOS\Architecture\Operation\x86_64\Entities\Fldpi::class;
    case FLDZ = \PHPOS\Architecture\Operation\x86_64\Entities\Fldz::class;
    case FMUL = \PHPOS\Architecture\Operation\x86_64\Entities\Fmul::class;
    case FMULP = \PHPOS\Architecture\Operation\x86_64\Entities\Fmulp::class;
    case FNCLEX = \PHPOS\Architecture\Operation\x86_64\Entities\Fnclex::class;
    case FNINIT = \PHPOS\Architecture\Operation\x86_64\Entities\Fninit::class;
    case FNOP = \PHPOS\Architecture\Operation\x86_64\Entities\Fnop::class;
    case FNSAVE = \PHPOS\Architecture\Operation\x86_64\Entities\Fnsave::class;
    case FNSTCW = \PHPOS\Architecture\Operation\x86_64\Entities\Fnstcw::class;
    case FNSTENV = \PHPOS\Architecture\Operation\x86_64\Entities\Fnstenv::class;
    case FNSTSW = \PHPOS\Architecture\Operation\x86_64\Entities\Fnstsw::class;
    case FPATAN = \PHPOS\Architecture\Operation\x86_64\Entities\Fpatan::class;
    case FPREM = \PHPOS\Architecture\Operation\x86_64\Entities\Fprem::class;
    case FPREM1 = \PHPOS\Architecture\Operation\x86_64\Entities\Fprem1::class;
    case FPTAN = \PHPOS\Architecture\Operation\x86_64\Entities\Fptan::class;
    case FRNDINT = \PHPOS\Architecture\Operation\x86_64\Entities\Frndint::class;
    case FRSTOR = \PHPOS\Architecture\Operation\x86_64\Entities\Frstor::class;
    case FSAVE = \PHPOS\Architecture\Operation\x86_64\Entities\Fsave::class;
    case FSCALE = \PHPOS\Architecture\Operation\x86_64\Entities\Fscale::class;
    case FSIN = \PHPOS\Architecture\Operation\x86_64\Entities\Fsin::class;
    case FSINCOS = \PHPOS\Architecture\Operation\x86_64\Entities\Fsincos::class;
    case FSQRT = \PHPOS\Architecture\Operation\x86_64\Entities\Fsqrt::class;
    case FST = \PHPOS\Architecture\Operation\x86_64\Entities\Fst::class;
    case FSTCW = \PHPOS\Architecture\Operation\x86_64\Entities\Fstcw::class;
    case FSTENV = \PHPOS\Architecture\Operation\x86_64\Entities\Fstenv::class;
    case FSTP = \PHPOS\Architecture\Operation\x86_64\Entities\Fstp::class;
    case FSTSW = \PHPOS\Architecture\Operation\x86_64\Entities\Fstsw::class;
    case FSUB = \PHPOS\Architecture\Operation\x86_64\Entities\Fsub::class;
    case FSUBP = \PHPOS\Architecture\Operation\x86_64\Entities\Fsubp::class;
    case FSUBR = \PHPOS\Architecture\Operation\x86_64\Entities\Fsubr::class;
    case FSUBRP = \PHPOS\Architecture\Operation\x86_64\Entities\Fsubrp::class;
    case FTST = \PHPOS\Architecture\Operation\x86_64\Entities\Ftst::class;
    case FUCOM = \PHPOS\Architecture\Operation\x86_64\Entities\Fucom::class;
    case FUCOMI = \PHPOS\Architecture\Operation\x86_64\Entities\Fucomi::class;
    case FUCOMIP = \PHPOS\Architecture\Operation\x86_64\Entities\Fucomip::class;
    case FUCOMP = \PHPOS\Architecture\Operation\x86_64\Entities\Fucomp::class;
    case FUCOMPP = \PHPOS\Architecture\Operation\x86_64\Entities\Fucompp::class;
    case FWAIT = \PHPOS\Architecture\Operation\x86_64\Entities\Fwait::class;
    case FXAM = \PHPOS\Architecture\Operation\x86_64\Entities\Fxam::class;
    case FXCH = \PHPOS\Architecture\Operation\x86_64\Entities\Fxch::class;
    case FXRSTOR = \PHPOS\Architecture\Operation\x86_64\Entities\Fxrstor::class;
    case FXSAVE = \PHPOS\Architecture\Operation\x86_64\Entities\Fxsave::class;
    case FXTRACT = \PHPOS\Architecture\Operation\x86_64\Entities\Fxtract::class;
    case FYL2X = \PHPOS\Architecture\Operation\x86_64\Entities\Fyl2x::class;
    case FYL2XP1 = \PHPOS\Architecture\Operation\x86_64\Entities\Fyl2xp1::class;
    case GF2P8AFFINEINVQB = \PHPOS\Architecture\Operation\x86_64\Entities\Gf2p8affineinvqb::class;
    case GF2P8AFFINEQB = \PHPOS\Architecture\Operation\x86_64\Entities\Gf2p8affineqb::class;
    case GF2P8MULB = \PHPOS\Architecture\Operation\x86_64\Entities\Gf2p8mulb::class;
    case HADDPD = \PHPOS\Architecture\Operation\x86_64\Entities\Haddpd::class;
    case HADDPS = \PHPOS\Architecture\Operation\x86_64\Entities\Haddps::class;
    case HLT = \PHPOS\Architecture\Operation\x86_64\Entities\Hlt::class;
    case HRESET = \PHPOS\Architecture\Operation\x86_64\Entities\Hreset::class;
    case HSUBPD = \PHPOS\Architecture\Operation\x86_64\Entities\Hsubpd::class;
    case HSUBPS = \PHPOS\Architecture\Operation\x86_64\Entities\Hsubps::class;
    case IDIV = \PHPOS\Architecture\Operation\x86_64\Entities\Idiv::class;
    case IMUL = \PHPOS\Architecture\Operation\x86_64\Entities\Imul::class;
    case IN = \PHPOS\Architecture\Operation\x86_64\Entities\In::class;
    case INC = \PHPOS\Architecture\Operation\x86_64\Entities\Inc::class;
    case INCSSPD = \PHPOS\Architecture\Operation\x86_64\Entities\Incsspd::class;
    case INCSSPQ = \PHPOS\Architecture\Operation\x86_64\Entities\Incsspq::class;
    case INS = \PHPOS\Architecture\Operation\x86_64\Entities\Ins::class;
    case INSB = \PHPOS\Architecture\Operation\x86_64\Entities\Insb::class;
    case INSD = \PHPOS\Architecture\Operation\x86_64\Entities\Insd::class;
    case INSERTPS = \PHPOS\Architecture\Operation\x86_64\Entities\Insertps::class;
    case INSW = \PHPOS\Architecture\Operation\x86_64\Entities\Insw::class;
    case INT_ = \PHPOS\Architecture\Operation\x86_64\Entities\Int_::class;
    case INT1 = \PHPOS\Architecture\Operation\x86_64\Entities\Int1::class;
    case INT3 = \PHPOS\Architecture\Operation\x86_64\Entities\Int3::class;
    case INTO = \PHPOS\Architecture\Operation\x86_64\Entities\Into::class;
    case INVD = \PHPOS\Architecture\Operation\x86_64\Entities\Invd::class;
    case INVLPG = \PHPOS\Architecture\Operation\x86_64\Entities\Invlpg::class;
    case INVPCID = \PHPOS\Architecture\Operation\x86_64\Entities\Invpcid::class;
    case IRET = \PHPOS\Architecture\Operation\x86_64\Entities\Iret::class;
    case IRETD = \PHPOS\Architecture\Operation\x86_64\Entities\Iretd::class;
    case IRETQ = \PHPOS\Architecture\Operation\x86_64\Entities\Iretq::class;
    case JMP = \PHPOS\Architecture\Operation\x86_64\Entities\Jmp::class;
    case JCC = \PHPOS\Architecture\Operation\x86_64\Entities\Jcc::class;
    case KADDB = \PHPOS\Architecture\Operation\x86_64\Entities\Kaddb::class;
    case KADDD = \PHPOS\Architecture\Operation\x86_64\Entities\Kaddd::class;
    case KADDQ = \PHPOS\Architecture\Operation\x86_64\Entities\Kaddq::class;
    case KADDW = \PHPOS\Architecture\Operation\x86_64\Entities\Kaddw::class;
    case KANDB = \PHPOS\Architecture\Operation\x86_64\Entities\Kandb::class;
    case KANDD = \PHPOS\Architecture\Operation\x86_64\Entities\Kandd::class;
    case KANDNB = \PHPOS\Architecture\Operation\x86_64\Entities\Kandnb::class;
    case KANDND = \PHPOS\Architecture\Operation\x86_64\Entities\Kandnd::class;
    case KANDNQ = \PHPOS\Architecture\Operation\x86_64\Entities\Kandnq::class;
    case KANDNW = \PHPOS\Architecture\Operation\x86_64\Entities\Kandnw::class;
    case KANDQ = \PHPOS\Architecture\Operation\x86_64\Entities\Kandq::class;
    case KANDW = \PHPOS\Architecture\Operation\x86_64\Entities\Kandw::class;
    case KMOVB = \PHPOS\Architecture\Operation\x86_64\Entities\Kmovb::class;
    case KMOVD = \PHPOS\Architecture\Operation\x86_64\Entities\Kmovd::class;
    case KMOVQ = \PHPOS\Architecture\Operation\x86_64\Entities\Kmovq::class;
    case KMOVW = \PHPOS\Architecture\Operation\x86_64\Entities\Kmovw::class;
    case KNOTB = \PHPOS\Architecture\Operation\x86_64\Entities\Knotb::class;
    case KNOTD = \PHPOS\Architecture\Operation\x86_64\Entities\Knotd::class;
    case KNOTQ = \PHPOS\Architecture\Operation\x86_64\Entities\Knotq::class;
    case KNOTW = \PHPOS\Architecture\Operation\x86_64\Entities\Knotw::class;
    case KORB = \PHPOS\Architecture\Operation\x86_64\Entities\Korb::class;
    case KORD = \PHPOS\Architecture\Operation\x86_64\Entities\Kord::class;
    case KORQ = \PHPOS\Architecture\Operation\x86_64\Entities\Korq::class;
    case KORTESTB = \PHPOS\Architecture\Operation\x86_64\Entities\Kortestb::class;
    case KORTESTD = \PHPOS\Architecture\Operation\x86_64\Entities\Kortestd::class;
    case KORTESTQ = \PHPOS\Architecture\Operation\x86_64\Entities\Kortestq::class;
    case KORTESTW = \PHPOS\Architecture\Operation\x86_64\Entities\Kortestw::class;
    case KORW = \PHPOS\Architecture\Operation\x86_64\Entities\Korw::class;
    case KSHIFTLB = \PHPOS\Architecture\Operation\x86_64\Entities\Kshiftlb::class;
    case KSHIFTLD = \PHPOS\Architecture\Operation\x86_64\Entities\Kshiftld::class;
    case KSHIFTLQ = \PHPOS\Architecture\Operation\x86_64\Entities\Kshiftlq::class;
    case KSHIFTLW = \PHPOS\Architecture\Operation\x86_64\Entities\Kshiftlw::class;
    case KSHIFTRB = \PHPOS\Architecture\Operation\x86_64\Entities\Kshiftrb::class;
    case KSHIFTRD = \PHPOS\Architecture\Operation\x86_64\Entities\Kshiftrd::class;
    case KSHIFTRQ = \PHPOS\Architecture\Operation\x86_64\Entities\Kshiftrq::class;
    case KSHIFTRW = \PHPOS\Architecture\Operation\x86_64\Entities\Kshiftrw::class;
    case KTESTB = \PHPOS\Architecture\Operation\x86_64\Entities\Ktestb::class;
    case KTESTD = \PHPOS\Architecture\Operation\x86_64\Entities\Ktestd::class;
    case KTESTQ = \PHPOS\Architecture\Operation\x86_64\Entities\Ktestq::class;
    case KTESTW = \PHPOS\Architecture\Operation\x86_64\Entities\Ktestw::class;
    case KUNPCKBW = \PHPOS\Architecture\Operation\x86_64\Entities\Kunpckbw::class;
    case KUNPCKDQ = \PHPOS\Architecture\Operation\x86_64\Entities\Kunpckdq::class;
    case KUNPCKWD = \PHPOS\Architecture\Operation\x86_64\Entities\Kunpckwd::class;
    case KXNORB = \PHPOS\Architecture\Operation\x86_64\Entities\Kxnorb::class;
    case KXNORD = \PHPOS\Architecture\Operation\x86_64\Entities\Kxnord::class;
    case KXNORQ = \PHPOS\Architecture\Operation\x86_64\Entities\Kxnorq::class;
    case KXNORW = \PHPOS\Architecture\Operation\x86_64\Entities\Kxnorw::class;
    case KXORB = \PHPOS\Architecture\Operation\x86_64\Entities\Kxorb::class;
    case KXORD = \PHPOS\Architecture\Operation\x86_64\Entities\Kxord::class;
    case KXORQ = \PHPOS\Architecture\Operation\x86_64\Entities\Kxorq::class;
    case KXORW = \PHPOS\Architecture\Operation\x86_64\Entities\Kxorw::class;
    case LAHF = \PHPOS\Architecture\Operation\x86_64\Entities\Lahf::class;
    case LAR = \PHPOS\Architecture\Operation\x86_64\Entities\Lar::class;
    case LDDQU = \PHPOS\Architecture\Operation\x86_64\Entities\Lddqu::class;
    case LDMXCSR = \PHPOS\Architecture\Operation\x86_64\Entities\Ldmxcsr::class;
    case LDS = \PHPOS\Architecture\Operation\x86_64\Entities\Lds::class;
    case LDTILECFG = \PHPOS\Architecture\Operation\x86_64\Entities\Ldtilecfg::class;
    case LEA = \PHPOS\Architecture\Operation\x86_64\Entities\Lea::class;
    case LEAVE = \PHPOS\Architecture\Operation\x86_64\Entities\Leave::class;
    case LES = \PHPOS\Architecture\Operation\x86_64\Entities\Les::class;
    case LFENCE = \PHPOS\Architecture\Operation\x86_64\Entities\Lfence::class;
    case LFS = \PHPOS\Architecture\Operation\x86_64\Entities\Lfs::class;
    case LGDT = \PHPOS\Architecture\Operation\x86_64\Entities\Lgdt::class;
    case LGS = \PHPOS\Architecture\Operation\x86_64\Entities\Lgs::class;
    case LIDT = \PHPOS\Architecture\Operation\x86_64\Entities\Lidt::class;
    case LLDT = \PHPOS\Architecture\Operation\x86_64\Entities\Lldt::class;
    case LMSW = \PHPOS\Architecture\Operation\x86_64\Entities\Lmsw::class;
    case LOADIWKEY = \PHPOS\Architecture\Operation\x86_64\Entities\Loadiwkey::class;
    case LOCK = \PHPOS\Architecture\Operation\x86_64\Entities\Lock::class;
    case LODS = \PHPOS\Architecture\Operation\x86_64\Entities\Lods::class;
    case LODSB = \PHPOS\Architecture\Operation\x86_64\Entities\Lodsb::class;
    case LODSD = \PHPOS\Architecture\Operation\x86_64\Entities\Lodsd::class;
    case LODSQ = \PHPOS\Architecture\Operation\x86_64\Entities\Lodsq::class;
    case LODSW = \PHPOS\Architecture\Operation\x86_64\Entities\Lodsw::class;
    case LOOP = \PHPOS\Architecture\Operation\x86_64\Entities\Loop::class;
    case LOOPCC = \PHPOS\Architecture\Operation\x86_64\Entities\Loopcc::class;
    case LSL = \PHPOS\Architecture\Operation\x86_64\Entities\Lsl::class;
    case LSS = \PHPOS\Architecture\Operation\x86_64\Entities\Lss::class;
    case LTR = \PHPOS\Architecture\Operation\x86_64\Entities\Ltr::class;
    case LZCNT = \PHPOS\Architecture\Operation\x86_64\Entities\Lzcnt::class;
    case MASKMOVDQU = \PHPOS\Architecture\Operation\x86_64\Entities\Maskmovdqu::class;
    case MASKMOVQ = \PHPOS\Architecture\Operation\x86_64\Entities\Maskmovq::class;
    case MAXPD = \PHPOS\Architecture\Operation\x86_64\Entities\Maxpd::class;
    case MAXPS = \PHPOS\Architecture\Operation\x86_64\Entities\Maxps::class;
    case MAXSD = \PHPOS\Architecture\Operation\x86_64\Entities\Maxsd::class;
    case MAXSS = \PHPOS\Architecture\Operation\x86_64\Entities\Maxss::class;
    case MFENCE = \PHPOS\Architecture\Operation\x86_64\Entities\Mfence::class;
    case MINPD = \PHPOS\Architecture\Operation\x86_64\Entities\Minpd::class;
    case MINPS = \PHPOS\Architecture\Operation\x86_64\Entities\Minps::class;
    case MINSD = \PHPOS\Architecture\Operation\x86_64\Entities\Minsd::class;
    case MINSS = \PHPOS\Architecture\Operation\x86_64\Entities\Minss::class;
    case MONITOR = \PHPOS\Architecture\Operation\x86_64\Entities\Monitor::class;
    case MOV = \PHPOS\Architecture\Operation\x86_64\Entities\Mov::class;
    case MOVAPD = \PHPOS\Architecture\Operation\x86_64\Entities\Movapd::class;
    case MOVAPS = \PHPOS\Architecture\Operation\x86_64\Entities\Movaps::class;
    case MOVBE = \PHPOS\Architecture\Operation\x86_64\Entities\Movbe::class;
    case MOVD = \PHPOS\Architecture\Operation\x86_64\Entities\Movd::class;
    case MOVDDUP = \PHPOS\Architecture\Operation\x86_64\Entities\Movddup::class;
    case MOVDIR64B = \PHPOS\Architecture\Operation\x86_64\Entities\Movdir64b::class;
    case MOVDIRI = \PHPOS\Architecture\Operation\x86_64\Entities\Movdiri::class;
    case MOVDQ2Q = \PHPOS\Architecture\Operation\x86_64\Entities\Movdq2q::class;
    case MOVDQA = \PHPOS\Architecture\Operation\x86_64\Entities\Movdqa::class;
    case MOVDQU = \PHPOS\Architecture\Operation\x86_64\Entities\Movdqu::class;
    case MOVHLPS = \PHPOS\Architecture\Operation\x86_64\Entities\Movhlps::class;
    case MOVHPD = \PHPOS\Architecture\Operation\x86_64\Entities\Movhpd::class;
    case MOVHPS = \PHPOS\Architecture\Operation\x86_64\Entities\Movhps::class;
    case MOVLHPS = \PHPOS\Architecture\Operation\x86_64\Entities\Movlhps::class;
    case MOVLPD = \PHPOS\Architecture\Operation\x86_64\Entities\Movlpd::class;
    case MOVLPS = \PHPOS\Architecture\Operation\x86_64\Entities\Movlps::class;
    case MOVMSKPD = \PHPOS\Architecture\Operation\x86_64\Entities\Movmskpd::class;
    case MOVMSKPS = \PHPOS\Architecture\Operation\x86_64\Entities\Movmskps::class;
    case MOVNTDQ = \PHPOS\Architecture\Operation\x86_64\Entities\Movntdq::class;
    case MOVNTDQA = \PHPOS\Architecture\Operation\x86_64\Entities\Movntdqa::class;
    case MOVNTI = \PHPOS\Architecture\Operation\x86_64\Entities\Movnti::class;
    case MOVNTPD = \PHPOS\Architecture\Operation\x86_64\Entities\Movntpd::class;
    case MOVNTPS = \PHPOS\Architecture\Operation\x86_64\Entities\Movntps::class;
    case MOVNTQ = \PHPOS\Architecture\Operation\x86_64\Entities\Movntq::class;
    case MOVQ = \PHPOS\Architecture\Operation\x86_64\Entities\Movq::class;
    case MOVQ2DQ = \PHPOS\Architecture\Operation\x86_64\Entities\Movq2dq::class;
    case MOVS = \PHPOS\Architecture\Operation\x86_64\Entities\Movs::class;
    case MOVSB = \PHPOS\Architecture\Operation\x86_64\Entities\Movsb::class;
    case MOVSD = \PHPOS\Architecture\Operation\x86_64\Entities\Movsd::class;
    case MOVSHDUP = \PHPOS\Architecture\Operation\x86_64\Entities\Movshdup::class;
    case MOVSLDUP = \PHPOS\Architecture\Operation\x86_64\Entities\Movsldup::class;
    case MOVSQ = \PHPOS\Architecture\Operation\x86_64\Entities\Movsq::class;
    case MOVSS = \PHPOS\Architecture\Operation\x86_64\Entities\Movss::class;
    case MOVSW = \PHPOS\Architecture\Operation\x86_64\Entities\Movsw::class;
    case MOVSX = \PHPOS\Architecture\Operation\x86_64\Entities\Movsx::class;
    case MOVSXD = \PHPOS\Architecture\Operation\x86_64\Entities\Movsxd::class;
    case MOVUPD = \PHPOS\Architecture\Operation\x86_64\Entities\Movupd::class;
    case MOVUPS = \PHPOS\Architecture\Operation\x86_64\Entities\Movups::class;
    case MOVZX = \PHPOS\Architecture\Operation\x86_64\Entities\Movzx::class;
    case MPSADBW = \PHPOS\Architecture\Operation\x86_64\Entities\Mpsadbw::class;
    case MUL = \PHPOS\Architecture\Operation\x86_64\Entities\Mul::class;
    case MULPD = \PHPOS\Architecture\Operation\x86_64\Entities\Mulpd::class;
    case MULPS = \PHPOS\Architecture\Operation\x86_64\Entities\Mulps::class;
    case MULSD = \PHPOS\Architecture\Operation\x86_64\Entities\Mulsd::class;
    case MULSS = \PHPOS\Architecture\Operation\x86_64\Entities\Mulss::class;
    case MULX = \PHPOS\Architecture\Operation\x86_64\Entities\Mulx::class;
    case MWAIT = \PHPOS\Architecture\Operation\x86_64\Entities\Mwait::class;
    case NEG = \PHPOS\Architecture\Operation\x86_64\Entities\Neg::class;
    case NOP = \PHPOS\Architecture\Operation\x86_64\Entities\Nop::class;
    case NOT = \PHPOS\Architecture\Operation\x86_64\Entities\Not::class;
    case OR_ = \PHPOS\Architecture\Operation\x86_64\Entities\Or_::class;
    case ORPD = \PHPOS\Architecture\Operation\x86_64\Entities\Orpd::class;
    case ORPS = \PHPOS\Architecture\Operation\x86_64\Entities\Orps::class;
    case OUT = \PHPOS\Architecture\Operation\x86_64\Entities\Out::class;
    case OUTS = \PHPOS\Architecture\Operation\x86_64\Entities\Outs::class;
    case OUTSB = \PHPOS\Architecture\Operation\x86_64\Entities\Outsb::class;
    case OUTSD = \PHPOS\Architecture\Operation\x86_64\Entities\Outsd::class;
    case OUTSW = \PHPOS\Architecture\Operation\x86_64\Entities\Outsw::class;
    case PABSB = \PHPOS\Architecture\Operation\x86_64\Entities\Pabsb::class;
    case PABSD = \PHPOS\Architecture\Operation\x86_64\Entities\Pabsd::class;
    case PABSQ = \PHPOS\Architecture\Operation\x86_64\Entities\Pabsq::class;
    case PABSW = \PHPOS\Architecture\Operation\x86_64\Entities\Pabsw::class;
    case PACKSSDW = \PHPOS\Architecture\Operation\x86_64\Entities\Packssdw::class;
    case PACKSSWB = \PHPOS\Architecture\Operation\x86_64\Entities\Packsswb::class;
    case PACKUSDW = \PHPOS\Architecture\Operation\x86_64\Entities\Packusdw::class;
    case PACKUSWB = \PHPOS\Architecture\Operation\x86_64\Entities\Packuswb::class;
    case PADDB = \PHPOS\Architecture\Operation\x86_64\Entities\Paddb::class;
    case PADDD = \PHPOS\Architecture\Operation\x86_64\Entities\Paddd::class;
    case PADDQ = \PHPOS\Architecture\Operation\x86_64\Entities\Paddq::class;
    case PADDSB = \PHPOS\Architecture\Operation\x86_64\Entities\Paddsb::class;
    case PADDSW = \PHPOS\Architecture\Operation\x86_64\Entities\Paddsw::class;
    case PADDUSB = \PHPOS\Architecture\Operation\x86_64\Entities\Paddusb::class;
    case PADDUSW = \PHPOS\Architecture\Operation\x86_64\Entities\Paddusw::class;
    case PADDW = \PHPOS\Architecture\Operation\x86_64\Entities\Paddw::class;
    case PALIGNR = \PHPOS\Architecture\Operation\x86_64\Entities\Palignr::class;
    case PAND = \PHPOS\Architecture\Operation\x86_64\Entities\Pand::class;
    case PANDN = \PHPOS\Architecture\Operation\x86_64\Entities\Pandn::class;
    case PAUSE = \PHPOS\Architecture\Operation\x86_64\Entities\Pause::class;
    case PAVGB = \PHPOS\Architecture\Operation\x86_64\Entities\Pavgb::class;
    case PAVGW = \PHPOS\Architecture\Operation\x86_64\Entities\Pavgw::class;
    case PBLENDVB = \PHPOS\Architecture\Operation\x86_64\Entities\Pblendvb::class;
    case PBLENDW = \PHPOS\Architecture\Operation\x86_64\Entities\Pblendw::class;
    case PCLMULQDQ = \PHPOS\Architecture\Operation\x86_64\Entities\Pclmulqdq::class;
    case PCMPEQB = \PHPOS\Architecture\Operation\x86_64\Entities\Pcmpeqb::class;
    case PCMPEQD = \PHPOS\Architecture\Operation\x86_64\Entities\Pcmpeqd::class;
    case PCMPEQQ = \PHPOS\Architecture\Operation\x86_64\Entities\Pcmpeqq::class;
    case PCMPEQW = \PHPOS\Architecture\Operation\x86_64\Entities\Pcmpeqw::class;
    case PCMPESTRI = \PHPOS\Architecture\Operation\x86_64\Entities\Pcmpestri::class;
    case PCMPESTRM = \PHPOS\Architecture\Operation\x86_64\Entities\Pcmpestrm::class;
    case PCMPGTB = \PHPOS\Architecture\Operation\x86_64\Entities\Pcmpgtb::class;
    case PCMPGTD = \PHPOS\Architecture\Operation\x86_64\Entities\Pcmpgtd::class;
    case PCMPGTQ = \PHPOS\Architecture\Operation\x86_64\Entities\Pcmpgtq::class;
    case PCMPGTW = \PHPOS\Architecture\Operation\x86_64\Entities\Pcmpgtw::class;
    case PCMPISTRI = \PHPOS\Architecture\Operation\x86_64\Entities\Pcmpistri::class;
    case PCMPISTRM = \PHPOS\Architecture\Operation\x86_64\Entities\Pcmpistrm::class;
    case PCONFIG = \PHPOS\Architecture\Operation\x86_64\Entities\Pconfig::class;
    case PDEP = \PHPOS\Architecture\Operation\x86_64\Entities\Pdep::class;
    case PEXT = \PHPOS\Architecture\Operation\x86_64\Entities\Pext::class;
    case PEXTRB = \PHPOS\Architecture\Operation\x86_64\Entities\Pextrb::class;
    case PEXTRD = \PHPOS\Architecture\Operation\x86_64\Entities\Pextrd::class;
    case PEXTRQ = \PHPOS\Architecture\Operation\x86_64\Entities\Pextrq::class;
    case PEXTRW = \PHPOS\Architecture\Operation\x86_64\Entities\Pextrw::class;
    case PHADDD = \PHPOS\Architecture\Operation\x86_64\Entities\Phaddd::class;
    case PHADDSW = \PHPOS\Architecture\Operation\x86_64\Entities\Phaddsw::class;
    case PHADDW = \PHPOS\Architecture\Operation\x86_64\Entities\Phaddw::class;
    case PHMINPOSUW = \PHPOS\Architecture\Operation\x86_64\Entities\Phminposuw::class;
    case PHSUBD = \PHPOS\Architecture\Operation\x86_64\Entities\Phsubd::class;
    case PHSUBSW = \PHPOS\Architecture\Operation\x86_64\Entities\Phsubsw::class;
    case PHSUBW = \PHPOS\Architecture\Operation\x86_64\Entities\Phsubw::class;
    case PINSRB = \PHPOS\Architecture\Operation\x86_64\Entities\Pinsrb::class;
    case PINSRD = \PHPOS\Architecture\Operation\x86_64\Entities\Pinsrd::class;
    case PINSRQ = \PHPOS\Architecture\Operation\x86_64\Entities\Pinsrq::class;
    case PINSRW = \PHPOS\Architecture\Operation\x86_64\Entities\Pinsrw::class;
    case PMADDUBSW = \PHPOS\Architecture\Operation\x86_64\Entities\Pmaddubsw::class;
    case PMADDWD = \PHPOS\Architecture\Operation\x86_64\Entities\Pmaddwd::class;
    case PMAXSB = \PHPOS\Architecture\Operation\x86_64\Entities\Pmaxsb::class;
    case PMAXSD = \PHPOS\Architecture\Operation\x86_64\Entities\Pmaxsd::class;
    case PMAXSQ = \PHPOS\Architecture\Operation\x86_64\Entities\Pmaxsq::class;
    case PMAXSW = \PHPOS\Architecture\Operation\x86_64\Entities\Pmaxsw::class;
    case PMAXUB = \PHPOS\Architecture\Operation\x86_64\Entities\Pmaxub::class;
    case PMAXUD = \PHPOS\Architecture\Operation\x86_64\Entities\Pmaxud::class;
    case PMAXUQ = \PHPOS\Architecture\Operation\x86_64\Entities\Pmaxuq::class;
    case PMAXUW = \PHPOS\Architecture\Operation\x86_64\Entities\Pmaxuw::class;
    case PMINSB = \PHPOS\Architecture\Operation\x86_64\Entities\Pminsb::class;
    case PMINSD = \PHPOS\Architecture\Operation\x86_64\Entities\Pminsd::class;
    case PMINSQ = \PHPOS\Architecture\Operation\x86_64\Entities\Pminsq::class;
    case PMINSW = \PHPOS\Architecture\Operation\x86_64\Entities\Pminsw::class;
    case PMINUB = \PHPOS\Architecture\Operation\x86_64\Entities\Pminub::class;
    case PMINUD = \PHPOS\Architecture\Operation\x86_64\Entities\Pminud::class;
    case PMINUQ = \PHPOS\Architecture\Operation\x86_64\Entities\Pminuq::class;
    case PMINUW = \PHPOS\Architecture\Operation\x86_64\Entities\Pminuw::class;
    case PMOVMSKB = \PHPOS\Architecture\Operation\x86_64\Entities\Pmovmskb::class;
    case PMOVSX = \PHPOS\Architecture\Operation\x86_64\Entities\Pmovsx::class;
    case PMOVZX = \PHPOS\Architecture\Operation\x86_64\Entities\Pmovzx::class;
    case PMULDQ = \PHPOS\Architecture\Operation\x86_64\Entities\Pmuldq::class;
    case PMULHRSW = \PHPOS\Architecture\Operation\x86_64\Entities\Pmulhrsw::class;
    case PMULHUW = \PHPOS\Architecture\Operation\x86_64\Entities\Pmulhuw::class;
    case PMULHW = \PHPOS\Architecture\Operation\x86_64\Entities\Pmulhw::class;
    case PMULLD = \PHPOS\Architecture\Operation\x86_64\Entities\Pmulld::class;
    case PMULLQ = \PHPOS\Architecture\Operation\x86_64\Entities\Pmullq::class;
    case PMULLW = \PHPOS\Architecture\Operation\x86_64\Entities\Pmullw::class;
    case PMULUDQ = \PHPOS\Architecture\Operation\x86_64\Entities\Pmuludq::class;
    case POP = \PHPOS\Architecture\Operation\x86_64\Entities\Pop::class;
    case POPA = \PHPOS\Architecture\Operation\x86_64\Entities\Popa::class;
    case POPAD = \PHPOS\Architecture\Operation\x86_64\Entities\Popad::class;
    case POPCNT = \PHPOS\Architecture\Operation\x86_64\Entities\Popcnt::class;
    case POPF = \PHPOS\Architecture\Operation\x86_64\Entities\Popf::class;
    case POPFD = \PHPOS\Architecture\Operation\x86_64\Entities\Popfd::class;
    case POPFQ = \PHPOS\Architecture\Operation\x86_64\Entities\Popfq::class;
    case POR = \PHPOS\Architecture\Operation\x86_64\Entities\Por::class;
    case PREFETCHW = \PHPOS\Architecture\Operation\x86_64\Entities\Prefetchw::class;
    case PREFETCHH = \PHPOS\Architecture\Operation\x86_64\Entities\Prefetchh::class;
    case PSADBW = \PHPOS\Architecture\Operation\x86_64\Entities\Psadbw::class;
    case PSHUFB = \PHPOS\Architecture\Operation\x86_64\Entities\Pshufb::class;
    case PSHUFD = \PHPOS\Architecture\Operation\x86_64\Entities\Pshufd::class;
    case PSHUFHW = \PHPOS\Architecture\Operation\x86_64\Entities\Pshufhw::class;
    case PSHUFLW = \PHPOS\Architecture\Operation\x86_64\Entities\Pshuflw::class;
    case PSHUFW = \PHPOS\Architecture\Operation\x86_64\Entities\Pshufw::class;
    case PSIGNB = \PHPOS\Architecture\Operation\x86_64\Entities\Psignb::class;
    case PSIGND = \PHPOS\Architecture\Operation\x86_64\Entities\Psignd::class;
    case PSIGNW = \PHPOS\Architecture\Operation\x86_64\Entities\Psignw::class;
    case PSLLD = \PHPOS\Architecture\Operation\x86_64\Entities\Pslld::class;
    case PSLLDQ = \PHPOS\Architecture\Operation\x86_64\Entities\Pslldq::class;
    case PSLLQ = \PHPOS\Architecture\Operation\x86_64\Entities\Psllq::class;
    case PSLLW = \PHPOS\Architecture\Operation\x86_64\Entities\Psllw::class;
    case PSRAD = \PHPOS\Architecture\Operation\x86_64\Entities\Psrad::class;
    case PSRAQ = \PHPOS\Architecture\Operation\x86_64\Entities\Psraq::class;
    case PSRAW = \PHPOS\Architecture\Operation\x86_64\Entities\Psraw::class;
    case PSRLD = \PHPOS\Architecture\Operation\x86_64\Entities\Psrld::class;
    case PSRLDQ = \PHPOS\Architecture\Operation\x86_64\Entities\Psrldq::class;
    case PSRLQ = \PHPOS\Architecture\Operation\x86_64\Entities\Psrlq::class;
    case PSRLW = \PHPOS\Architecture\Operation\x86_64\Entities\Psrlw::class;
    case PSUBB = \PHPOS\Architecture\Operation\x86_64\Entities\Psubb::class;
    case PSUBD = \PHPOS\Architecture\Operation\x86_64\Entities\Psubd::class;
    case PSUBQ = \PHPOS\Architecture\Operation\x86_64\Entities\Psubq::class;
    case PSUBSB = \PHPOS\Architecture\Operation\x86_64\Entities\Psubsb::class;
    case PSUBSW = \PHPOS\Architecture\Operation\x86_64\Entities\Psubsw::class;
    case PSUBUSB = \PHPOS\Architecture\Operation\x86_64\Entities\Psubusb::class;
    case PSUBUSW = \PHPOS\Architecture\Operation\x86_64\Entities\Psubusw::class;
    case PSUBW = \PHPOS\Architecture\Operation\x86_64\Entities\Psubw::class;
    case PTEST = \PHPOS\Architecture\Operation\x86_64\Entities\Ptest::class;
    case PTWRITE = \PHPOS\Architecture\Operation\x86_64\Entities\Ptwrite::class;
    case PUNPCKHBW = \PHPOS\Architecture\Operation\x86_64\Entities\Punpckhbw::class;
    case PUNPCKHDQ = \PHPOS\Architecture\Operation\x86_64\Entities\Punpckhdq::class;
    case PUNPCKHQDQ = \PHPOS\Architecture\Operation\x86_64\Entities\Punpckhqdq::class;
    case PUNPCKHWD = \PHPOS\Architecture\Operation\x86_64\Entities\Punpckhwd::class;
    case PUNPCKLBW = \PHPOS\Architecture\Operation\x86_64\Entities\Punpcklbw::class;
    case PUNPCKLDQ = \PHPOS\Architecture\Operation\x86_64\Entities\Punpckldq::class;
    case PUNPCKLQDQ = \PHPOS\Architecture\Operation\x86_64\Entities\Punpcklqdq::class;
    case PUNPCKLWD = \PHPOS\Architecture\Operation\x86_64\Entities\Punpcklwd::class;
    case PUSH = \PHPOS\Architecture\Operation\x86_64\Entities\Push::class;
    case PUSHA = \PHPOS\Architecture\Operation\x86_64\Entities\Pusha::class;
    case PUSHAD = \PHPOS\Architecture\Operation\x86_64\Entities\Pushad::class;
    case PUSHF = \PHPOS\Architecture\Operation\x86_64\Entities\Pushf::class;
    case PUSHFD = \PHPOS\Architecture\Operation\x86_64\Entities\Pushfd::class;
    case PUSHFQ = \PHPOS\Architecture\Operation\x86_64\Entities\Pushfq::class;
    case PXOR = \PHPOS\Architecture\Operation\x86_64\Entities\Pxor::class;
    case RCL = \PHPOS\Architecture\Operation\x86_64\Entities\Rcl::class;
    case RCPPS = \PHPOS\Architecture\Operation\x86_64\Entities\Rcpps::class;
    case RCPSS = \PHPOS\Architecture\Operation\x86_64\Entities\Rcpss::class;
    case RCR = \PHPOS\Architecture\Operation\x86_64\Entities\Rcr::class;
    case RDFSBASE = \PHPOS\Architecture\Operation\x86_64\Entities\Rdfsbase::class;
    case RDGSBASE = \PHPOS\Architecture\Operation\x86_64\Entities\Rdgsbase::class;
    case RDMSR = \PHPOS\Architecture\Operation\x86_64\Entities\Rdmsr::class;
    case RDPID = \PHPOS\Architecture\Operation\x86_64\Entities\Rdpid::class;
    case RDPKRU = \PHPOS\Architecture\Operation\x86_64\Entities\Rdpkru::class;
    case RDPMC = \PHPOS\Architecture\Operation\x86_64\Entities\Rdpmc::class;
    case RDRAND = \PHPOS\Architecture\Operation\x86_64\Entities\Rdrand::class;
    case RDSEED = \PHPOS\Architecture\Operation\x86_64\Entities\Rdseed::class;
    case RDSSPD = \PHPOS\Architecture\Operation\x86_64\Entities\Rdsspd::class;
    case RDSSPQ = \PHPOS\Architecture\Operation\x86_64\Entities\Rdsspq::class;
    case RDTSC = \PHPOS\Architecture\Operation\x86_64\Entities\Rdtsc::class;
    case RDTSCP = \PHPOS\Architecture\Operation\x86_64\Entities\Rdtscp::class;
    case REP = \PHPOS\Architecture\Operation\x86_64\Entities\Rep::class;
    case REPE = \PHPOS\Architecture\Operation\x86_64\Entities\Repe::class;
    case REPNE = \PHPOS\Architecture\Operation\x86_64\Entities\Repne::class;
    case REPNZ = \PHPOS\Architecture\Operation\x86_64\Entities\Repnz::class;
    case REPZ = \PHPOS\Architecture\Operation\x86_64\Entities\Repz::class;
    case RET = \PHPOS\Architecture\Operation\x86_64\Entities\Ret::class;
    case ROL = \PHPOS\Architecture\Operation\x86_64\Entities\Rol::class;
    case ROR = \PHPOS\Architecture\Operation\x86_64\Entities\Ror::class;
    case RORX = \PHPOS\Architecture\Operation\x86_64\Entities\Rorx::class;
    case ROUNDPD = \PHPOS\Architecture\Operation\x86_64\Entities\Roundpd::class;
    case ROUNDPS = \PHPOS\Architecture\Operation\x86_64\Entities\Roundps::class;
    case ROUNDSD = \PHPOS\Architecture\Operation\x86_64\Entities\Roundsd::class;
    case ROUNDSS = \PHPOS\Architecture\Operation\x86_64\Entities\Roundss::class;
    case RSM = \PHPOS\Architecture\Operation\x86_64\Entities\Rsm::class;
    case RSQRTPS = \PHPOS\Architecture\Operation\x86_64\Entities\Rsqrtps::class;
    case RSQRTSS = \PHPOS\Architecture\Operation\x86_64\Entities\Rsqrtss::class;
    case RSTORSSP = \PHPOS\Architecture\Operation\x86_64\Entities\Rstorssp::class;
    case SAHF = \PHPOS\Architecture\Operation\x86_64\Entities\Sahf::class;
    case SAL = \PHPOS\Architecture\Operation\x86_64\Entities\Sal::class;
    case SAR = \PHPOS\Architecture\Operation\x86_64\Entities\Sar::class;
    case SARX = \PHPOS\Architecture\Operation\x86_64\Entities\Sarx::class;
    case SAVEPREVSSP = \PHPOS\Architecture\Operation\x86_64\Entities\Saveprevssp::class;
    case SBB = \PHPOS\Architecture\Operation\x86_64\Entities\Sbb::class;
    case SCAS = \PHPOS\Architecture\Operation\x86_64\Entities\Scas::class;
    case SCASB = \PHPOS\Architecture\Operation\x86_64\Entities\Scasb::class;
    case SCASD = \PHPOS\Architecture\Operation\x86_64\Entities\Scasd::class;
    case SCASW = \PHPOS\Architecture\Operation\x86_64\Entities\Scasw::class;
    case SENDUIPI = \PHPOS\Architecture\Operation\x86_64\Entities\Senduipi::class;
    case SERIALIZE = \PHPOS\Architecture\Operation\x86_64\Entities\Serialize::class;
    case SETSSBSY = \PHPOS\Architecture\Operation\x86_64\Entities\Setssbsy::class;
    case SETCC = \PHPOS\Architecture\Operation\x86_64\Entities\Setcc::class;
    case SFENCE = \PHPOS\Architecture\Operation\x86_64\Entities\Sfence::class;
    case SGDT = \PHPOS\Architecture\Operation\x86_64\Entities\Sgdt::class;
    case SHA1MSG1 = \PHPOS\Architecture\Operation\x86_64\Entities\Sha1msg1::class;
    case SHA1MSG2 = \PHPOS\Architecture\Operation\x86_64\Entities\Sha1msg2::class;
    case SHA1NEXTE = \PHPOS\Architecture\Operation\x86_64\Entities\Sha1nexte::class;
    case SHA1RNDS4 = \PHPOS\Architecture\Operation\x86_64\Entities\Sha1rnds4::class;
    case SHA256MSG1 = \PHPOS\Architecture\Operation\x86_64\Entities\Sha256msg1::class;
    case SHA256MSG2 = \PHPOS\Architecture\Operation\x86_64\Entities\Sha256msg2::class;
    case SHA256RNDS2 = \PHPOS\Architecture\Operation\x86_64\Entities\Sha256rnds2::class;
    case SHL = \PHPOS\Architecture\Operation\x86_64\Entities\Shl::class;
    case SHLD = \PHPOS\Architecture\Operation\x86_64\Entities\Shld::class;
    case SHLX = \PHPOS\Architecture\Operation\x86_64\Entities\Shlx::class;
    case SHR = \PHPOS\Architecture\Operation\x86_64\Entities\Shr::class;
    case SHRD = \PHPOS\Architecture\Operation\x86_64\Entities\Shrd::class;
    case SHRX = \PHPOS\Architecture\Operation\x86_64\Entities\Shrx::class;
    case SHUFPD = \PHPOS\Architecture\Operation\x86_64\Entities\Shufpd::class;
    case SHUFPS = \PHPOS\Architecture\Operation\x86_64\Entities\Shufps::class;
    case SIDT = \PHPOS\Architecture\Operation\x86_64\Entities\Sidt::class;
    case SLDT = \PHPOS\Architecture\Operation\x86_64\Entities\Sldt::class;
    case SMSW = \PHPOS\Architecture\Operation\x86_64\Entities\Smsw::class;
    case SQRTPD = \PHPOS\Architecture\Operation\x86_64\Entities\Sqrtpd::class;
    case SQRTPS = \PHPOS\Architecture\Operation\x86_64\Entities\Sqrtps::class;
    case SQRTSD = \PHPOS\Architecture\Operation\x86_64\Entities\Sqrtsd::class;
    case SQRTSS = \PHPOS\Architecture\Operation\x86_64\Entities\Sqrtss::class;
    case STAC = \PHPOS\Architecture\Operation\x86_64\Entities\Stac::class;
    case STC = \PHPOS\Architecture\Operation\x86_64\Entities\Stc::class;
    case STD = \PHPOS\Architecture\Operation\x86_64\Entities\Std::class;
    case STI = \PHPOS\Architecture\Operation\x86_64\Entities\Sti::class;
    case STMXCSR = \PHPOS\Architecture\Operation\x86_64\Entities\Stmxcsr::class;
    case STOS = \PHPOS\Architecture\Operation\x86_64\Entities\Stos::class;
    case STOSB = \PHPOS\Architecture\Operation\x86_64\Entities\Stosb::class;
    case STOSD = \PHPOS\Architecture\Operation\x86_64\Entities\Stosd::class;
    case STOSQ = \PHPOS\Architecture\Operation\x86_64\Entities\Stosq::class;
    case STOSW = \PHPOS\Architecture\Operation\x86_64\Entities\Stosw::class;
    case STR = \PHPOS\Architecture\Operation\x86_64\Entities\Str::class;
    case STTILECFG = \PHPOS\Architecture\Operation\x86_64\Entities\Sttilecfg::class;
    case STUI = \PHPOS\Architecture\Operation\x86_64\Entities\Stui::class;
    case SUB = \PHPOS\Architecture\Operation\x86_64\Entities\Sub::class;
    case SUBPD = \PHPOS\Architecture\Operation\x86_64\Entities\Subpd::class;
    case SUBPS = \PHPOS\Architecture\Operation\x86_64\Entities\Subps::class;
    case SUBSD = \PHPOS\Architecture\Operation\x86_64\Entities\Subsd::class;
    case SUBSS = \PHPOS\Architecture\Operation\x86_64\Entities\Subss::class;
    case SWAPGS = \PHPOS\Architecture\Operation\x86_64\Entities\Swapgs::class;
    case SYSCALL = \PHPOS\Architecture\Operation\x86_64\Entities\Syscall::class;
    case SYSENTER = \PHPOS\Architecture\Operation\x86_64\Entities\Sysenter::class;
    case SYSEXIT = \PHPOS\Architecture\Operation\x86_64\Entities\Sysexit::class;
    case SYSRET = \PHPOS\Architecture\Operation\x86_64\Entities\Sysret::class;
    case TDPBF16PS = \PHPOS\Architecture\Operation\x86_64\Entities\Tdpbf16ps::class;
    case TDPBSSD = \PHPOS\Architecture\Operation\x86_64\Entities\Tdpbssd::class;
    case TDPBSUD = \PHPOS\Architecture\Operation\x86_64\Entities\Tdpbsud::class;
    case TDPBUSD = \PHPOS\Architecture\Operation\x86_64\Entities\Tdpbusd::class;
    case TDPBUUD = \PHPOS\Architecture\Operation\x86_64\Entities\Tdpbuud::class;
    case TEST = \PHPOS\Architecture\Operation\x86_64\Entities\Test::class;
    case TESTUI = \PHPOS\Architecture\Operation\x86_64\Entities\Testui::class;
    case TILELOADD = \PHPOS\Architecture\Operation\x86_64\Entities\Tileloadd::class;
    case TILELOADDT1 = \PHPOS\Architecture\Operation\x86_64\Entities\Tileloaddt1::class;
    case TILERELEASE = \PHPOS\Architecture\Operation\x86_64\Entities\Tilerelease::class;
    case TILESTORED = \PHPOS\Architecture\Operation\x86_64\Entities\Tilestored::class;
    case TILEZERO = \PHPOS\Architecture\Operation\x86_64\Entities\Tilezero::class;
    case TPAUSE = \PHPOS\Architecture\Operation\x86_64\Entities\Tpause::class;
    case TZCNT = \PHPOS\Architecture\Operation\x86_64\Entities\Tzcnt::class;
    case UCOMISD = \PHPOS\Architecture\Operation\x86_64\Entities\Ucomisd::class;
    case UCOMISS = \PHPOS\Architecture\Operation\x86_64\Entities\Ucomiss::class;
    case UD = \PHPOS\Architecture\Operation\x86_64\Entities\Ud::class;
    case UIRET = \PHPOS\Architecture\Operation\x86_64\Entities\Uiret::class;
    case UMONITOR = \PHPOS\Architecture\Operation\x86_64\Entities\Umonitor::class;
    case UMWAIT = \PHPOS\Architecture\Operation\x86_64\Entities\Umwait::class;
    case UNPCKHPD = \PHPOS\Architecture\Operation\x86_64\Entities\Unpckhpd::class;
    case UNPCKHPS = \PHPOS\Architecture\Operation\x86_64\Entities\Unpckhps::class;
    case UNPCKLPD = \PHPOS\Architecture\Operation\x86_64\Entities\Unpcklpd::class;
    case UNPCKLPS = \PHPOS\Architecture\Operation\x86_64\Entities\Unpcklps::class;
    case VADDPH = \PHPOS\Architecture\Operation\x86_64\Entities\Vaddph::class;
    case VADDSH = \PHPOS\Architecture\Operation\x86_64\Entities\Vaddsh::class;
    case VALIGND = \PHPOS\Architecture\Operation\x86_64\Entities\Valignd::class;
    case VALIGNQ = \PHPOS\Architecture\Operation\x86_64\Entities\Valignq::class;
    case VBLENDMPD = \PHPOS\Architecture\Operation\x86_64\Entities\Vblendmpd::class;
    case VBLENDMPS = \PHPOS\Architecture\Operation\x86_64\Entities\Vblendmps::class;
    case VBROADCAST = \PHPOS\Architecture\Operation\x86_64\Entities\Vbroadcast::class;
    case VCMPPH = \PHPOS\Architecture\Operation\x86_64\Entities\Vcmpph::class;
    case VCMPSH = \PHPOS\Architecture\Operation\x86_64\Entities\Vcmpsh::class;
    case VCOMISH = \PHPOS\Architecture\Operation\x86_64\Entities\Vcomish::class;
    case VCOMPRESSPD = \PHPOS\Architecture\Operation\x86_64\Entities\Vcompresspd::class;
    case VCOMPRESSPS = \PHPOS\Architecture\Operation\x86_64\Entities\Vcompressps::class;
    case VCOMPRESSW = \PHPOS\Architecture\Operation\x86_64\Entities\Vcompressw::class;
    case VCVTDQ2PH = \PHPOS\Architecture\Operation\x86_64\Entities\Vcvtdq2ph::class;
    case VCVTNE2PS2BF16 = \PHPOS\Architecture\Operation\x86_64\Entities\Vcvtne2ps2bf16::class;
    case VCVTNEPS2BF16 = \PHPOS\Architecture\Operation\x86_64\Entities\Vcvtneps2bf16::class;
    case VCVTPD2PH = \PHPOS\Architecture\Operation\x86_64\Entities\Vcvtpd2ph::class;
    case VCVTPD2QQ = \PHPOS\Architecture\Operation\x86_64\Entities\Vcvtpd2qq::class;
    case VCVTPD2UDQ = \PHPOS\Architecture\Operation\x86_64\Entities\Vcvtpd2udq::class;
    case VCVTPD2UQQ = \PHPOS\Architecture\Operation\x86_64\Entities\Vcvtpd2uqq::class;
    case VCVTPH2DQ = \PHPOS\Architecture\Operation\x86_64\Entities\Vcvtph2dq::class;
    case VCVTPH2PD = \PHPOS\Architecture\Operation\x86_64\Entities\Vcvtph2pd::class;
    case VCVTPH2PS = \PHPOS\Architecture\Operation\x86_64\Entities\Vcvtph2ps::class;
    case VCVTPH2PSX = \PHPOS\Architecture\Operation\x86_64\Entities\Vcvtph2psx::class;
    case VCVTPH2QQ = \PHPOS\Architecture\Operation\x86_64\Entities\Vcvtph2qq::class;
    case VCVTPH2UDQ = \PHPOS\Architecture\Operation\x86_64\Entities\Vcvtph2udq::class;
    case VCVTPH2UQQ = \PHPOS\Architecture\Operation\x86_64\Entities\Vcvtph2uqq::class;
    case VCVTPH2UW = \PHPOS\Architecture\Operation\x86_64\Entities\Vcvtph2uw::class;
    case VCVTPH2W = \PHPOS\Architecture\Operation\x86_64\Entities\Vcvtph2w::class;
    case VCVTPS2PH = \PHPOS\Architecture\Operation\x86_64\Entities\Vcvtps2ph::class;
    case VCVTPS2PHX = \PHPOS\Architecture\Operation\x86_64\Entities\Vcvtps2phx::class;
    case VCVTPS2QQ = \PHPOS\Architecture\Operation\x86_64\Entities\Vcvtps2qq::class;
    case VCVTPS2UDQ = \PHPOS\Architecture\Operation\x86_64\Entities\Vcvtps2udq::class;
    case VCVTPS2UQQ = \PHPOS\Architecture\Operation\x86_64\Entities\Vcvtps2uqq::class;
    case VCVTQQ2PD = \PHPOS\Architecture\Operation\x86_64\Entities\Vcvtqq2pd::class;
    case VCVTQQ2PH = \PHPOS\Architecture\Operation\x86_64\Entities\Vcvtqq2ph::class;
    case VCVTQQ2PS = \PHPOS\Architecture\Operation\x86_64\Entities\Vcvtqq2ps::class;
    case VCVTSD2SH = \PHPOS\Architecture\Operation\x86_64\Entities\Vcvtsd2sh::class;
    case VCVTSD2USI = \PHPOS\Architecture\Operation\x86_64\Entities\Vcvtsd2usi::class;
    case VCVTSH2SD = \PHPOS\Architecture\Operation\x86_64\Entities\Vcvtsh2sd::class;
    case VCVTSH2SI = \PHPOS\Architecture\Operation\x86_64\Entities\Vcvtsh2si::class;
    case VCVTSH2SS = \PHPOS\Architecture\Operation\x86_64\Entities\Vcvtsh2ss::class;
    case VCVTSH2USI = \PHPOS\Architecture\Operation\x86_64\Entities\Vcvtsh2usi::class;
    case VCVTSI2SH = \PHPOS\Architecture\Operation\x86_64\Entities\Vcvtsi2sh::class;
    case VCVTSS2SH = \PHPOS\Architecture\Operation\x86_64\Entities\Vcvtss2sh::class;
    case VCVTSS2USI = \PHPOS\Architecture\Operation\x86_64\Entities\Vcvtss2usi::class;
    case VCVTTPD2QQ = \PHPOS\Architecture\Operation\x86_64\Entities\Vcvttpd2qq::class;
    case VCVTTPD2UDQ = \PHPOS\Architecture\Operation\x86_64\Entities\Vcvttpd2udq::class;
    case VCVTTPD2UQQ = \PHPOS\Architecture\Operation\x86_64\Entities\Vcvttpd2uqq::class;
    case VCVTTPH2DQ = \PHPOS\Architecture\Operation\x86_64\Entities\Vcvttph2dq::class;
    case VCVTTPH2QQ = \PHPOS\Architecture\Operation\x86_64\Entities\Vcvttph2qq::class;
    case VCVTTPH2UDQ = \PHPOS\Architecture\Operation\x86_64\Entities\Vcvttph2udq::class;
    case VCVTTPH2UQQ = \PHPOS\Architecture\Operation\x86_64\Entities\Vcvttph2uqq::class;
    case VCVTTPH2UW = \PHPOS\Architecture\Operation\x86_64\Entities\Vcvttph2uw::class;
    case VCVTTPH2W = \PHPOS\Architecture\Operation\x86_64\Entities\Vcvttph2w::class;
    case VCVTTPS2QQ = \PHPOS\Architecture\Operation\x86_64\Entities\Vcvttps2qq::class;
    case VCVTTPS2UDQ = \PHPOS\Architecture\Operation\x86_64\Entities\Vcvttps2udq::class;
    case VCVTTPS2UQQ = \PHPOS\Architecture\Operation\x86_64\Entities\Vcvttps2uqq::class;
    case VCVTTSD2USI = \PHPOS\Architecture\Operation\x86_64\Entities\Vcvttsd2usi::class;
    case VCVTTSH2SI = \PHPOS\Architecture\Operation\x86_64\Entities\Vcvttsh2si::class;
    case VCVTTSH2USI = \PHPOS\Architecture\Operation\x86_64\Entities\Vcvttsh2usi::class;
    case VCVTTSS2USI = \PHPOS\Architecture\Operation\x86_64\Entities\Vcvttss2usi::class;
    case VCVTUDQ2PD = \PHPOS\Architecture\Operation\x86_64\Entities\Vcvtudq2pd::class;
    case VCVTUDQ2PH = \PHPOS\Architecture\Operation\x86_64\Entities\Vcvtudq2ph::class;
    case VCVTUDQ2PS = \PHPOS\Architecture\Operation\x86_64\Entities\Vcvtudq2ps::class;
    case VCVTUQQ2PD = \PHPOS\Architecture\Operation\x86_64\Entities\Vcvtuqq2pd::class;
    case VCVTUQQ2PH = \PHPOS\Architecture\Operation\x86_64\Entities\Vcvtuqq2ph::class;
    case VCVTUQQ2PS = \PHPOS\Architecture\Operation\x86_64\Entities\Vcvtuqq2ps::class;
    case VCVTUSI2SD = \PHPOS\Architecture\Operation\x86_64\Entities\Vcvtusi2sd::class;
    case VCVTUSI2SH = \PHPOS\Architecture\Operation\x86_64\Entities\Vcvtusi2sh::class;
    case VCVTUSI2SS = \PHPOS\Architecture\Operation\x86_64\Entities\Vcvtusi2ss::class;
    case VCVTUW2PH = \PHPOS\Architecture\Operation\x86_64\Entities\Vcvtuw2ph::class;
    case VCVTW2PH = \PHPOS\Architecture\Operation\x86_64\Entities\Vcvtw2ph::class;
    case VDBPSADBW = \PHPOS\Architecture\Operation\x86_64\Entities\Vdbpsadbw::class;
    case VDIVPH = \PHPOS\Architecture\Operation\x86_64\Entities\Vdivph::class;
    case VDIVSH = \PHPOS\Architecture\Operation\x86_64\Entities\Vdivsh::class;
    case VDPBF16PS = \PHPOS\Architecture\Operation\x86_64\Entities\Vdpbf16ps::class;
    case VERR = \PHPOS\Architecture\Operation\x86_64\Entities\Verr::class;
    case VERW = \PHPOS\Architecture\Operation\x86_64\Entities\Verw::class;
    case VEXPANDPD = \PHPOS\Architecture\Operation\x86_64\Entities\Vexpandpd::class;
    case VEXPANDPS = \PHPOS\Architecture\Operation\x86_64\Entities\Vexpandps::class;
    case VEXTRACTF128 = \PHPOS\Architecture\Operation\x86_64\Entities\Vextractf128::class;
    case VEXTRACTF32X4 = \PHPOS\Architecture\Operation\x86_64\Entities\Vextractf32x4::class;
    case VEXTRACTF32X8 = \PHPOS\Architecture\Operation\x86_64\Entities\Vextractf32x8::class;
    case VEXTRACTF64X2 = \PHPOS\Architecture\Operation\x86_64\Entities\Vextractf64x2::class;
    case VEXTRACTF64X4 = \PHPOS\Architecture\Operation\x86_64\Entities\Vextractf64x4::class;
    case VEXTRACTI128 = \PHPOS\Architecture\Operation\x86_64\Entities\Vextracti128::class;
    case VEXTRACTI32X4 = \PHPOS\Architecture\Operation\x86_64\Entities\Vextracti32x4::class;
    case VEXTRACTI32X8 = \PHPOS\Architecture\Operation\x86_64\Entities\Vextracti32x8::class;
    case VEXTRACTI64X2 = \PHPOS\Architecture\Operation\x86_64\Entities\Vextracti64x2::class;
    case VEXTRACTI64X4 = \PHPOS\Architecture\Operation\x86_64\Entities\Vextracti64x4::class;
    case VFCMADDCPH = \PHPOS\Architecture\Operation\x86_64\Entities\Vfcmaddcph::class;
    case VFCMADDCSH = \PHPOS\Architecture\Operation\x86_64\Entities\Vfcmaddcsh::class;
    case VFCMULCPH = \PHPOS\Architecture\Operation\x86_64\Entities\Vfcmulcph::class;
    case VFCMULCSH = \PHPOS\Architecture\Operation\x86_64\Entities\Vfcmulcsh::class;
    case VFIXUPIMMPD = \PHPOS\Architecture\Operation\x86_64\Entities\Vfixupimmpd::class;
    case VFIXUPIMMPS = \PHPOS\Architecture\Operation\x86_64\Entities\Vfixupimmps::class;
    case VFIXUPIMMSD = \PHPOS\Architecture\Operation\x86_64\Entities\Vfixupimmsd::class;
    case VFIXUPIMMSS = \PHPOS\Architecture\Operation\x86_64\Entities\Vfixupimmss::class;
    case VFMADD132PD = \PHPOS\Architecture\Operation\x86_64\Entities\Vfmadd132pd::class;
    case VFMADD132PH = \PHPOS\Architecture\Operation\x86_64\Entities\Vfmadd132ph::class;
    case VFMADD132PS = \PHPOS\Architecture\Operation\x86_64\Entities\Vfmadd132ps::class;
    case VFMADD132SD = \PHPOS\Architecture\Operation\x86_64\Entities\Vfmadd132sd::class;
    case VFMADD132SH = \PHPOS\Architecture\Operation\x86_64\Entities\Vfmadd132sh::class;
    case VFMADD132SS = \PHPOS\Architecture\Operation\x86_64\Entities\Vfmadd132ss::class;
    case VFMADD213PD = \PHPOS\Architecture\Operation\x86_64\Entities\Vfmadd213pd::class;
    case VFMADD213PH = \PHPOS\Architecture\Operation\x86_64\Entities\Vfmadd213ph::class;
    case VFMADD213PS = \PHPOS\Architecture\Operation\x86_64\Entities\Vfmadd213ps::class;
    case VFMADD213SD = \PHPOS\Architecture\Operation\x86_64\Entities\Vfmadd213sd::class;
    case VFMADD213SH = \PHPOS\Architecture\Operation\x86_64\Entities\Vfmadd213sh::class;
    case VFMADD213SS = \PHPOS\Architecture\Operation\x86_64\Entities\Vfmadd213ss::class;
    case VFMADD231PD = \PHPOS\Architecture\Operation\x86_64\Entities\Vfmadd231pd::class;
    case VFMADD231PH = \PHPOS\Architecture\Operation\x86_64\Entities\Vfmadd231ph::class;
    case VFMADD231PS = \PHPOS\Architecture\Operation\x86_64\Entities\Vfmadd231ps::class;
    case VFMADD231SD = \PHPOS\Architecture\Operation\x86_64\Entities\Vfmadd231sd::class;
    case VFMADD231SH = \PHPOS\Architecture\Operation\x86_64\Entities\Vfmadd231sh::class;
    case VFMADD231SS = \PHPOS\Architecture\Operation\x86_64\Entities\Vfmadd231ss::class;
    case VFMADDCPH = \PHPOS\Architecture\Operation\x86_64\Entities\Vfmaddcph::class;
    case VFMADDCSH = \PHPOS\Architecture\Operation\x86_64\Entities\Vfmaddcsh::class;
    case VFMADDRND231PD = \PHPOS\Architecture\Operation\x86_64\Entities\Vfmaddrnd231pd::class;
    case VFMADDSUB132PD = \PHPOS\Architecture\Operation\x86_64\Entities\Vfmaddsub132pd::class;
    case VFMADDSUB132PH = \PHPOS\Architecture\Operation\x86_64\Entities\Vfmaddsub132ph::class;
    case VFMADDSUB132PS = \PHPOS\Architecture\Operation\x86_64\Entities\Vfmaddsub132ps::class;
    case VFMADDSUB213PD = \PHPOS\Architecture\Operation\x86_64\Entities\Vfmaddsub213pd::class;
    case VFMADDSUB213PH = \PHPOS\Architecture\Operation\x86_64\Entities\Vfmaddsub213ph::class;
    case VFMADDSUB213PS = \PHPOS\Architecture\Operation\x86_64\Entities\Vfmaddsub213ps::class;
    case VFMADDSUB231PD = \PHPOS\Architecture\Operation\x86_64\Entities\Vfmaddsub231pd::class;
    case VFMADDSUB231PH = \PHPOS\Architecture\Operation\x86_64\Entities\Vfmaddsub231ph::class;
    case VFMADDSUB231PS = \PHPOS\Architecture\Operation\x86_64\Entities\Vfmaddsub231ps::class;
    case VFMSUB132PD = \PHPOS\Architecture\Operation\x86_64\Entities\Vfmsub132pd::class;
    case VFMSUB132PH = \PHPOS\Architecture\Operation\x86_64\Entities\Vfmsub132ph::class;
    case VFMSUB132PS = \PHPOS\Architecture\Operation\x86_64\Entities\Vfmsub132ps::class;
    case VFMSUB132SD = \PHPOS\Architecture\Operation\x86_64\Entities\Vfmsub132sd::class;
    case VFMSUB132SH = \PHPOS\Architecture\Operation\x86_64\Entities\Vfmsub132sh::class;
    case VFMSUB132SS = \PHPOS\Architecture\Operation\x86_64\Entities\Vfmsub132ss::class;
    case VFMSUB213PD = \PHPOS\Architecture\Operation\x86_64\Entities\Vfmsub213pd::class;
    case VFMSUB213PH = \PHPOS\Architecture\Operation\x86_64\Entities\Vfmsub213ph::class;
    case VFMSUB213PS = \PHPOS\Architecture\Operation\x86_64\Entities\Vfmsub213ps::class;
    case VFMSUB213SD = \PHPOS\Architecture\Operation\x86_64\Entities\Vfmsub213sd::class;
    case VFMSUB213SH = \PHPOS\Architecture\Operation\x86_64\Entities\Vfmsub213sh::class;
    case VFMSUB213SS = \PHPOS\Architecture\Operation\x86_64\Entities\Vfmsub213ss::class;
    case VFMSUB231PD = \PHPOS\Architecture\Operation\x86_64\Entities\Vfmsub231pd::class;
    case VFMSUB231PH = \PHPOS\Architecture\Operation\x86_64\Entities\Vfmsub231ph::class;
    case VFMSUB231PS = \PHPOS\Architecture\Operation\x86_64\Entities\Vfmsub231ps::class;
    case VFMSUB231SD = \PHPOS\Architecture\Operation\x86_64\Entities\Vfmsub231sd::class;
    case VFMSUB231SH = \PHPOS\Architecture\Operation\x86_64\Entities\Vfmsub231sh::class;
    case VFMSUB231SS = \PHPOS\Architecture\Operation\x86_64\Entities\Vfmsub231ss::class;
    case VFMSUBADD132PD = \PHPOS\Architecture\Operation\x86_64\Entities\Vfmsubadd132pd::class;
    case VFMSUBADD132PH = \PHPOS\Architecture\Operation\x86_64\Entities\Vfmsubadd132ph::class;
    case VFMSUBADD132PS = \PHPOS\Architecture\Operation\x86_64\Entities\Vfmsubadd132ps::class;
    case VFMSUBADD213PD = \PHPOS\Architecture\Operation\x86_64\Entities\Vfmsubadd213pd::class;
    case VFMSUBADD213PH = \PHPOS\Architecture\Operation\x86_64\Entities\Vfmsubadd213ph::class;
    case VFMSUBADD213PS = \PHPOS\Architecture\Operation\x86_64\Entities\Vfmsubadd213ps::class;
    case VFMSUBADD231PD = \PHPOS\Architecture\Operation\x86_64\Entities\Vfmsubadd231pd::class;
    case VFMSUBADD231PH = \PHPOS\Architecture\Operation\x86_64\Entities\Vfmsubadd231ph::class;
    case VFMSUBADD231PS = \PHPOS\Architecture\Operation\x86_64\Entities\Vfmsubadd231ps::class;
    case VFMULCPH = \PHPOS\Architecture\Operation\x86_64\Entities\Vfmulcph::class;
    case VFMULCSH = \PHPOS\Architecture\Operation\x86_64\Entities\Vfmulcsh::class;
    case VFNMADD132PD = \PHPOS\Architecture\Operation\x86_64\Entities\Vfnmadd132pd::class;
    case VFNMADD132PH = \PHPOS\Architecture\Operation\x86_64\Entities\Vfnmadd132ph::class;
    case VFNMADD132PS = \PHPOS\Architecture\Operation\x86_64\Entities\Vfnmadd132ps::class;
    case VFNMADD132SD = \PHPOS\Architecture\Operation\x86_64\Entities\Vfnmadd132sd::class;
    case VFNMADD132SH = \PHPOS\Architecture\Operation\x86_64\Entities\Vfnmadd132sh::class;
    case VFNMADD132SS = \PHPOS\Architecture\Operation\x86_64\Entities\Vfnmadd132ss::class;
    case VFNMADD213PD = \PHPOS\Architecture\Operation\x86_64\Entities\Vfnmadd213pd::class;
    case VFNMADD213PH = \PHPOS\Architecture\Operation\x86_64\Entities\Vfnmadd213ph::class;
    case VFNMADD213PS = \PHPOS\Architecture\Operation\x86_64\Entities\Vfnmadd213ps::class;
    case VFNMADD213SD = \PHPOS\Architecture\Operation\x86_64\Entities\Vfnmadd213sd::class;
    case VFNMADD213SH = \PHPOS\Architecture\Operation\x86_64\Entities\Vfnmadd213sh::class;
    case VFNMADD213SS = \PHPOS\Architecture\Operation\x86_64\Entities\Vfnmadd213ss::class;
    case VFNMADD231PD = \PHPOS\Architecture\Operation\x86_64\Entities\Vfnmadd231pd::class;
    case VFNMADD231PH = \PHPOS\Architecture\Operation\x86_64\Entities\Vfnmadd231ph::class;
    case VFNMADD231PS = \PHPOS\Architecture\Operation\x86_64\Entities\Vfnmadd231ps::class;
    case VFNMADD231SD = \PHPOS\Architecture\Operation\x86_64\Entities\Vfnmadd231sd::class;
    case VFNMADD231SH = \PHPOS\Architecture\Operation\x86_64\Entities\Vfnmadd231sh::class;
    case VFNMADD231SS = \PHPOS\Architecture\Operation\x86_64\Entities\Vfnmadd231ss::class;
    case VFNMSUB132PD = \PHPOS\Architecture\Operation\x86_64\Entities\Vfnmsub132pd::class;
    case VFNMSUB132PH = \PHPOS\Architecture\Operation\x86_64\Entities\Vfnmsub132ph::class;
    case VFNMSUB132PS = \PHPOS\Architecture\Operation\x86_64\Entities\Vfnmsub132ps::class;
    case VFNMSUB132SD = \PHPOS\Architecture\Operation\x86_64\Entities\Vfnmsub132sd::class;
    case VFNMSUB132SH = \PHPOS\Architecture\Operation\x86_64\Entities\Vfnmsub132sh::class;
    case VFNMSUB132SS = \PHPOS\Architecture\Operation\x86_64\Entities\Vfnmsub132ss::class;
    case VFNMSUB213PD = \PHPOS\Architecture\Operation\x86_64\Entities\Vfnmsub213pd::class;
    case VFNMSUB213PH = \PHPOS\Architecture\Operation\x86_64\Entities\Vfnmsub213ph::class;
    case VFNMSUB213PS = \PHPOS\Architecture\Operation\x86_64\Entities\Vfnmsub213ps::class;
    case VFNMSUB213SD = \PHPOS\Architecture\Operation\x86_64\Entities\Vfnmsub213sd::class;
    case VFNMSUB213SH = \PHPOS\Architecture\Operation\x86_64\Entities\Vfnmsub213sh::class;
    case VFNMSUB213SS = \PHPOS\Architecture\Operation\x86_64\Entities\Vfnmsub213ss::class;
    case VFNMSUB231PD = \PHPOS\Architecture\Operation\x86_64\Entities\Vfnmsub231pd::class;
    case VFNMSUB231PH = \PHPOS\Architecture\Operation\x86_64\Entities\Vfnmsub231ph::class;
    case VFNMSUB231PS = \PHPOS\Architecture\Operation\x86_64\Entities\Vfnmsub231ps::class;
    case VFNMSUB231SD = \PHPOS\Architecture\Operation\x86_64\Entities\Vfnmsub231sd::class;
    case VFNMSUB231SH = \PHPOS\Architecture\Operation\x86_64\Entities\Vfnmsub231sh::class;
    case VFNMSUB231SS = \PHPOS\Architecture\Operation\x86_64\Entities\Vfnmsub231ss::class;
    case VFPCLASSPD = \PHPOS\Architecture\Operation\x86_64\Entities\Vfpclasspd::class;
    case VFPCLASSPH = \PHPOS\Architecture\Operation\x86_64\Entities\Vfpclassph::class;
    case VFPCLASSPS = \PHPOS\Architecture\Operation\x86_64\Entities\Vfpclassps::class;
    case VFPCLASSSD = \PHPOS\Architecture\Operation\x86_64\Entities\Vfpclasssd::class;
    case VFPCLASSSH = \PHPOS\Architecture\Operation\x86_64\Entities\Vfpclasssh::class;
    case VFPCLASSSS = \PHPOS\Architecture\Operation\x86_64\Entities\Vfpclassss::class;
    case VGATHERDPD = \PHPOS\Architecture\Operation\x86_64\Entities\Vgatherdpd::class;
    case VGATHERDPS = \PHPOS\Architecture\Operation\x86_64\Entities\Vgatherdps::class;
    case VGATHERQPD = \PHPOS\Architecture\Operation\x86_64\Entities\Vgatherqpd::class;
    case VGATHERQPS = \PHPOS\Architecture\Operation\x86_64\Entities\Vgatherqps::class;
    case VGETEXPPD = \PHPOS\Architecture\Operation\x86_64\Entities\Vgetexppd::class;
    case VGETEXPPH = \PHPOS\Architecture\Operation\x86_64\Entities\Vgetexpph::class;
    case VGETEXPPS = \PHPOS\Architecture\Operation\x86_64\Entities\Vgetexpps::class;
    case VGETEXPSD = \PHPOS\Architecture\Operation\x86_64\Entities\Vgetexpsd::class;
    case VGETEXPSH = \PHPOS\Architecture\Operation\x86_64\Entities\Vgetexpsh::class;
    case VGETEXPSS = \PHPOS\Architecture\Operation\x86_64\Entities\Vgetexpss::class;
    case VGETMANTPD = \PHPOS\Architecture\Operation\x86_64\Entities\Vgetmantpd::class;
    case VGETMANTPH = \PHPOS\Architecture\Operation\x86_64\Entities\Vgetmantph::class;
    case VGETMANTPS = \PHPOS\Architecture\Operation\x86_64\Entities\Vgetmantps::class;
    case VGETMANTSD = \PHPOS\Architecture\Operation\x86_64\Entities\Vgetmantsd::class;
    case VGETMANTSH = \PHPOS\Architecture\Operation\x86_64\Entities\Vgetmantsh::class;
    case VGETMANTSS = \PHPOS\Architecture\Operation\x86_64\Entities\Vgetmantss::class;
    case VINSERTF128 = \PHPOS\Architecture\Operation\x86_64\Entities\Vinsertf128::class;
    case VINSERTF32X4 = \PHPOS\Architecture\Operation\x86_64\Entities\Vinsertf32x4::class;
    case VINSERTF32X8 = \PHPOS\Architecture\Operation\x86_64\Entities\Vinsertf32x8::class;
    case VINSERTF64X2 = \PHPOS\Architecture\Operation\x86_64\Entities\Vinsertf64x2::class;
    case VINSERTF64X4 = \PHPOS\Architecture\Operation\x86_64\Entities\Vinsertf64x4::class;
    case VINSERTI128 = \PHPOS\Architecture\Operation\x86_64\Entities\Vinserti128::class;
    case VINSERTI32X4 = \PHPOS\Architecture\Operation\x86_64\Entities\Vinserti32x4::class;
    case VINSERTI32X8 = \PHPOS\Architecture\Operation\x86_64\Entities\Vinserti32x8::class;
    case VINSERTI64X2 = \PHPOS\Architecture\Operation\x86_64\Entities\Vinserti64x2::class;
    case VINSERTI64X4 = \PHPOS\Architecture\Operation\x86_64\Entities\Vinserti64x4::class;
    case VMASKMOV = \PHPOS\Architecture\Operation\x86_64\Entities\Vmaskmov::class;
    case VMAXPH = \PHPOS\Architecture\Operation\x86_64\Entities\Vmaxph::class;
    case VMAXSH = \PHPOS\Architecture\Operation\x86_64\Entities\Vmaxsh::class;
    case VMINPH = \PHPOS\Architecture\Operation\x86_64\Entities\Vminph::class;
    case VMINSH = \PHPOS\Architecture\Operation\x86_64\Entities\Vminsh::class;
    case VMOVDQA32 = \PHPOS\Architecture\Operation\x86_64\Entities\Vmovdqa32::class;
    case VMOVDQA64 = \PHPOS\Architecture\Operation\x86_64\Entities\Vmovdqa64::class;
    case VMOVDQU16 = \PHPOS\Architecture\Operation\x86_64\Entities\Vmovdqu16::class;
    case VMOVDQU32 = \PHPOS\Architecture\Operation\x86_64\Entities\Vmovdqu32::class;
    case VMOVDQU64 = \PHPOS\Architecture\Operation\x86_64\Entities\Vmovdqu64::class;
    case VMOVDQU8 = \PHPOS\Architecture\Operation\x86_64\Entities\Vmovdqu8::class;
    case VMOVSH = \PHPOS\Architecture\Operation\x86_64\Entities\Vmovsh::class;
    case VMOVW = \PHPOS\Architecture\Operation\x86_64\Entities\Vmovw::class;
    case VMULPH = \PHPOS\Architecture\Operation\x86_64\Entities\Vmulph::class;
    case VMULSH = \PHPOS\Architecture\Operation\x86_64\Entities\Vmulsh::class;
    case VP2INTERSECTD = \PHPOS\Architecture\Operation\x86_64\Entities\Vp2intersectd::class;
    case VP2INTERSECTQ = \PHPOS\Architecture\Operation\x86_64\Entities\Vp2intersectq::class;
    case VPBLENDD = \PHPOS\Architecture\Operation\x86_64\Entities\Vpblendd::class;
    case VPBLENDMB = \PHPOS\Architecture\Operation\x86_64\Entities\Vpblendmb::class;
    case VPBLENDMD = \PHPOS\Architecture\Operation\x86_64\Entities\Vpblendmd::class;
    case VPBLENDMQ = \PHPOS\Architecture\Operation\x86_64\Entities\Vpblendmq::class;
    case VPBLENDMW = \PHPOS\Architecture\Operation\x86_64\Entities\Vpblendmw::class;
    case VPBROADCAST = \PHPOS\Architecture\Operation\x86_64\Entities\Vpbroadcast::class;
    case VPBROADCASTB = \PHPOS\Architecture\Operation\x86_64\Entities\Vpbroadcastb::class;
    case VPBROADCASTD = \PHPOS\Architecture\Operation\x86_64\Entities\Vpbroadcastd::class;
    case VPBROADCASTM = \PHPOS\Architecture\Operation\x86_64\Entities\Vpbroadcastm::class;
    case VPBROADCASTQ = \PHPOS\Architecture\Operation\x86_64\Entities\Vpbroadcastq::class;
    case VPBROADCASTW = \PHPOS\Architecture\Operation\x86_64\Entities\Vpbroadcastw::class;
    case VPCMPB = \PHPOS\Architecture\Operation\x86_64\Entities\Vpcmpb::class;
    case VPCMPD = \PHPOS\Architecture\Operation\x86_64\Entities\Vpcmpd::class;
    case VPCMPQ = \PHPOS\Architecture\Operation\x86_64\Entities\Vpcmpq::class;
    case VPCMPUB = \PHPOS\Architecture\Operation\x86_64\Entities\Vpcmpub::class;
    case VPCMPUD = \PHPOS\Architecture\Operation\x86_64\Entities\Vpcmpud::class;
    case VPCMPUQ = \PHPOS\Architecture\Operation\x86_64\Entities\Vpcmpuq::class;
    case VPCMPUW = \PHPOS\Architecture\Operation\x86_64\Entities\Vpcmpuw::class;
    case VPCMPW = \PHPOS\Architecture\Operation\x86_64\Entities\Vpcmpw::class;
    case VPCOMPRESSB = \PHPOS\Architecture\Operation\x86_64\Entities\Vpcompressb::class;
    case VPCOMPRESSD = \PHPOS\Architecture\Operation\x86_64\Entities\Vpcompressd::class;
    case VPCOMPRESSQ = \PHPOS\Architecture\Operation\x86_64\Entities\Vpcompressq::class;
    case VPCONFLICTD = \PHPOS\Architecture\Operation\x86_64\Entities\Vpconflictd::class;
    case VPCONFLICTQ = \PHPOS\Architecture\Operation\x86_64\Entities\Vpconflictq::class;
    case VPDPBUSD = \PHPOS\Architecture\Operation\x86_64\Entities\Vpdpbusd::class;
    case VPDPBUSDS = \PHPOS\Architecture\Operation\x86_64\Entities\Vpdpbusds::class;
    case VPDPWSSD = \PHPOS\Architecture\Operation\x86_64\Entities\Vpdpwssd::class;
    case VPDPWSSDS = \PHPOS\Architecture\Operation\x86_64\Entities\Vpdpwssds::class;
    case VPERM2F128 = \PHPOS\Architecture\Operation\x86_64\Entities\Vperm2f128::class;
    case VPERM2I128 = \PHPOS\Architecture\Operation\x86_64\Entities\Vperm2i128::class;
    case VPERMB = \PHPOS\Architecture\Operation\x86_64\Entities\Vpermb::class;
    case VPERMD = \PHPOS\Architecture\Operation\x86_64\Entities\Vpermd::class;
    case VPERMI2B = \PHPOS\Architecture\Operation\x86_64\Entities\Vpermi2b::class;
    case VPERMI2D = \PHPOS\Architecture\Operation\x86_64\Entities\Vpermi2d::class;
    case VPERMI2PD = \PHPOS\Architecture\Operation\x86_64\Entities\Vpermi2pd::class;
    case VPERMI2PS = \PHPOS\Architecture\Operation\x86_64\Entities\Vpermi2ps::class;
    case VPERMI2Q = \PHPOS\Architecture\Operation\x86_64\Entities\Vpermi2q::class;
    case VPERMI2W = \PHPOS\Architecture\Operation\x86_64\Entities\Vpermi2w::class;
    case VPERMILPD = \PHPOS\Architecture\Operation\x86_64\Entities\Vpermilpd::class;
    case VPERMILPS = \PHPOS\Architecture\Operation\x86_64\Entities\Vpermilps::class;
    case VPERMPD = \PHPOS\Architecture\Operation\x86_64\Entities\Vpermpd::class;
    case VPERMPS = \PHPOS\Architecture\Operation\x86_64\Entities\Vpermps::class;
    case VPERMQ = \PHPOS\Architecture\Operation\x86_64\Entities\Vpermq::class;
    case VPERMT2B = \PHPOS\Architecture\Operation\x86_64\Entities\Vpermt2b::class;
    case VPERMT2D = \PHPOS\Architecture\Operation\x86_64\Entities\Vpermt2d::class;
    case VPERMT2PD = \PHPOS\Architecture\Operation\x86_64\Entities\Vpermt2pd::class;
    case VPERMT2PS = \PHPOS\Architecture\Operation\x86_64\Entities\Vpermt2ps::class;
    case VPERMT2Q = \PHPOS\Architecture\Operation\x86_64\Entities\Vpermt2q::class;
    case VPERMT2W = \PHPOS\Architecture\Operation\x86_64\Entities\Vpermt2w::class;
    case VPERMW = \PHPOS\Architecture\Operation\x86_64\Entities\Vpermw::class;
    case VPEXPANDB = \PHPOS\Architecture\Operation\x86_64\Entities\Vpexpandb::class;
    case VPEXPANDD = \PHPOS\Architecture\Operation\x86_64\Entities\Vpexpandd::class;
    case VPEXPANDQ = \PHPOS\Architecture\Operation\x86_64\Entities\Vpexpandq::class;
    case VPEXPANDW = \PHPOS\Architecture\Operation\x86_64\Entities\Vpexpandw::class;
    case VPGATHERDD = \PHPOS\Architecture\Operation\x86_64\Entities\Vpgatherdd::class;
    case VPGATHERDQ = \PHPOS\Architecture\Operation\x86_64\Entities\Vpgatherdq::class;
    case VPGATHERQD = \PHPOS\Architecture\Operation\x86_64\Entities\Vpgatherqd::class;
    case VPGATHERQQ = \PHPOS\Architecture\Operation\x86_64\Entities\Vpgatherqq::class;
    case VPLZCNTD = \PHPOS\Architecture\Operation\x86_64\Entities\Vplzcntd::class;
    case VPLZCNTQ = \PHPOS\Architecture\Operation\x86_64\Entities\Vplzcntq::class;
    case VPMADD52HUQ = \PHPOS\Architecture\Operation\x86_64\Entities\Vpmadd52huq::class;
    case VPMADD52LUQ = \PHPOS\Architecture\Operation\x86_64\Entities\Vpmadd52luq::class;
    case VPMASKMOV = \PHPOS\Architecture\Operation\x86_64\Entities\Vpmaskmov::class;
    case VPMOVB2M = \PHPOS\Architecture\Operation\x86_64\Entities\Vpmovb2m::class;
    case VPMOVD2M = \PHPOS\Architecture\Operation\x86_64\Entities\Vpmovd2m::class;
    case VPMOVDB = \PHPOS\Architecture\Operation\x86_64\Entities\Vpmovdb::class;
    case VPMOVDW = \PHPOS\Architecture\Operation\x86_64\Entities\Vpmovdw::class;
    case VPMOVM2B = \PHPOS\Architecture\Operation\x86_64\Entities\Vpmovm2b::class;
    case VPMOVM2D = \PHPOS\Architecture\Operation\x86_64\Entities\Vpmovm2d::class;
    case VPMOVM2Q = \PHPOS\Architecture\Operation\x86_64\Entities\Vpmovm2q::class;
    case VPMOVM2W = \PHPOS\Architecture\Operation\x86_64\Entities\Vpmovm2w::class;
    case VPMOVQ2M = \PHPOS\Architecture\Operation\x86_64\Entities\Vpmovq2m::class;
    case VPMOVQB = \PHPOS\Architecture\Operation\x86_64\Entities\Vpmovqb::class;
    case VPMOVQD = \PHPOS\Architecture\Operation\x86_64\Entities\Vpmovqd::class;
    case VPMOVQW = \PHPOS\Architecture\Operation\x86_64\Entities\Vpmovqw::class;
    case VPMOVSDB = \PHPOS\Architecture\Operation\x86_64\Entities\Vpmovsdb::class;
    case VPMOVSDW = \PHPOS\Architecture\Operation\x86_64\Entities\Vpmovsdw::class;
    case VPMOVSQB = \PHPOS\Architecture\Operation\x86_64\Entities\Vpmovsqb::class;
    case VPMOVSQD = \PHPOS\Architecture\Operation\x86_64\Entities\Vpmovsqd::class;
    case VPMOVSQW = \PHPOS\Architecture\Operation\x86_64\Entities\Vpmovsqw::class;
    case VPMOVSWB = \PHPOS\Architecture\Operation\x86_64\Entities\Vpmovswb::class;
    case VPMOVUSDB = \PHPOS\Architecture\Operation\x86_64\Entities\Vpmovusdb::class;
    case VPMOVUSDW = \PHPOS\Architecture\Operation\x86_64\Entities\Vpmovusdw::class;
    case VPMOVUSQB = \PHPOS\Architecture\Operation\x86_64\Entities\Vpmovusqb::class;
    case VPMOVUSQD = \PHPOS\Architecture\Operation\x86_64\Entities\Vpmovusqd::class;
    case VPMOVUSQW = \PHPOS\Architecture\Operation\x86_64\Entities\Vpmovusqw::class;
    case VPMOVUSWB = \PHPOS\Architecture\Operation\x86_64\Entities\Vpmovuswb::class;
    case VPMOVW2M = \PHPOS\Architecture\Operation\x86_64\Entities\Vpmovw2m::class;
    case VPMOVWB = \PHPOS\Architecture\Operation\x86_64\Entities\Vpmovwb::class;
    case VPMULTISHIFTQB = \PHPOS\Architecture\Operation\x86_64\Entities\Vpmultishiftqb::class;
    case VPOPCNT = \PHPOS\Architecture\Operation\x86_64\Entities\Vpopcnt::class;
    case VPROLD = \PHPOS\Architecture\Operation\x86_64\Entities\Vprold::class;
    case VPROLQ = \PHPOS\Architecture\Operation\x86_64\Entities\Vprolq::class;
    case VPROLVD = \PHPOS\Architecture\Operation\x86_64\Entities\Vprolvd::class;
    case VPROLVQ = \PHPOS\Architecture\Operation\x86_64\Entities\Vprolvq::class;
    case VPRORD = \PHPOS\Architecture\Operation\x86_64\Entities\Vprord::class;
    case VPRORQ = \PHPOS\Architecture\Operation\x86_64\Entities\Vprorq::class;
    case VPRORVD = \PHPOS\Architecture\Operation\x86_64\Entities\Vprorvd::class;
    case VPRORVQ = \PHPOS\Architecture\Operation\x86_64\Entities\Vprorvq::class;
    case VPSCATTERDD = \PHPOS\Architecture\Operation\x86_64\Entities\Vpscatterdd::class;
    case VPSCATTERDQ = \PHPOS\Architecture\Operation\x86_64\Entities\Vpscatterdq::class;
    case VPSCATTERQD = \PHPOS\Architecture\Operation\x86_64\Entities\Vpscatterqd::class;
    case VPSCATTERQQ = \PHPOS\Architecture\Operation\x86_64\Entities\Vpscatterqq::class;
    case VPSHLD = \PHPOS\Architecture\Operation\x86_64\Entities\Vpshld::class;
    case VPSHLDV = \PHPOS\Architecture\Operation\x86_64\Entities\Vpshldv::class;
    case VPSHRD = \PHPOS\Architecture\Operation\x86_64\Entities\Vpshrd::class;
    case VPSHRDV = \PHPOS\Architecture\Operation\x86_64\Entities\Vpshrdv::class;
    case VPSHUFBITQMB = \PHPOS\Architecture\Operation\x86_64\Entities\Vpshufbitqmb::class;
    case VPSLLVD = \PHPOS\Architecture\Operation\x86_64\Entities\Vpsllvd::class;
    case VPSLLVQ = \PHPOS\Architecture\Operation\x86_64\Entities\Vpsllvq::class;
    case VPSLLVW = \PHPOS\Architecture\Operation\x86_64\Entities\Vpsllvw::class;
    case VPSRAVD = \PHPOS\Architecture\Operation\x86_64\Entities\Vpsravd::class;
    case VPSRAVQ = \PHPOS\Architecture\Operation\x86_64\Entities\Vpsravq::class;
    case VPSRAVW = \PHPOS\Architecture\Operation\x86_64\Entities\Vpsravw::class;
    case VPSRLVD = \PHPOS\Architecture\Operation\x86_64\Entities\Vpsrlvd::class;
    case VPSRLVQ = \PHPOS\Architecture\Operation\x86_64\Entities\Vpsrlvq::class;
    case VPSRLVW = \PHPOS\Architecture\Operation\x86_64\Entities\Vpsrlvw::class;
    case VPTERNLOGD = \PHPOS\Architecture\Operation\x86_64\Entities\Vpternlogd::class;
    case VPTERNLOGQ = \PHPOS\Architecture\Operation\x86_64\Entities\Vpternlogq::class;
    case VPTESTMB = \PHPOS\Architecture\Operation\x86_64\Entities\Vptestmb::class;
    case VPTESTMD = \PHPOS\Architecture\Operation\x86_64\Entities\Vptestmd::class;
    case VPTESTMQ = \PHPOS\Architecture\Operation\x86_64\Entities\Vptestmq::class;
    case VPTESTMW = \PHPOS\Architecture\Operation\x86_64\Entities\Vptestmw::class;
    case VPTESTNMB = \PHPOS\Architecture\Operation\x86_64\Entities\Vptestnmb::class;
    case VPTESTNMD = \PHPOS\Architecture\Operation\x86_64\Entities\Vptestnmd::class;
    case VPTESTNMQ = \PHPOS\Architecture\Operation\x86_64\Entities\Vptestnmq::class;
    case VPTESTNMW = \PHPOS\Architecture\Operation\x86_64\Entities\Vptestnmw::class;
    case VRANGEPD = \PHPOS\Architecture\Operation\x86_64\Entities\Vrangepd::class;
    case VRANGEPS = \PHPOS\Architecture\Operation\x86_64\Entities\Vrangeps::class;
    case VRANGESD = \PHPOS\Architecture\Operation\x86_64\Entities\Vrangesd::class;
    case VRANGESS = \PHPOS\Architecture\Operation\x86_64\Entities\Vrangess::class;
    case VRCP14PD = \PHPOS\Architecture\Operation\x86_64\Entities\Vrcp14pd::class;
    case VRCP14PS = \PHPOS\Architecture\Operation\x86_64\Entities\Vrcp14ps::class;
    case VRCP14SD = \PHPOS\Architecture\Operation\x86_64\Entities\Vrcp14sd::class;
    case VRCP14SS = \PHPOS\Architecture\Operation\x86_64\Entities\Vrcp14ss::class;
    case VRCPPH = \PHPOS\Architecture\Operation\x86_64\Entities\Vrcpph::class;
    case VRCPSH = \PHPOS\Architecture\Operation\x86_64\Entities\Vrcpsh::class;
    case VREDUCEPD = \PHPOS\Architecture\Operation\x86_64\Entities\Vreducepd::class;
    case VREDUCEPH = \PHPOS\Architecture\Operation\x86_64\Entities\Vreduceph::class;
    case VREDUCEPS = \PHPOS\Architecture\Operation\x86_64\Entities\Vreduceps::class;
    case VREDUCESD = \PHPOS\Architecture\Operation\x86_64\Entities\Vreducesd::class;
    case VREDUCESH = \PHPOS\Architecture\Operation\x86_64\Entities\Vreducesh::class;
    case VREDUCESS = \PHPOS\Architecture\Operation\x86_64\Entities\Vreducess::class;
    case VRNDSCALEPD = \PHPOS\Architecture\Operation\x86_64\Entities\Vrndscalepd::class;
    case VRNDSCALEPH = \PHPOS\Architecture\Operation\x86_64\Entities\Vrndscaleph::class;
    case VRNDSCALEPS = \PHPOS\Architecture\Operation\x86_64\Entities\Vrndscaleps::class;
    case VRNDSCALESD = \PHPOS\Architecture\Operation\x86_64\Entities\Vrndscalesd::class;
    case VRNDSCALESH = \PHPOS\Architecture\Operation\x86_64\Entities\Vrndscalesh::class;
    case VRNDSCALESS = \PHPOS\Architecture\Operation\x86_64\Entities\Vrndscaless::class;
    case VRSQRT14PD = \PHPOS\Architecture\Operation\x86_64\Entities\Vrsqrt14pd::class;
    case VRSQRT14PS = \PHPOS\Architecture\Operation\x86_64\Entities\Vrsqrt14ps::class;
    case VRSQRT14SD = \PHPOS\Architecture\Operation\x86_64\Entities\Vrsqrt14sd::class;
    case VRSQRT14SS = \PHPOS\Architecture\Operation\x86_64\Entities\Vrsqrt14ss::class;
    case VRSQRTPH = \PHPOS\Architecture\Operation\x86_64\Entities\Vrsqrtph::class;
    case VRSQRTSH = \PHPOS\Architecture\Operation\x86_64\Entities\Vrsqrtsh::class;
    case VSCALEFPD = \PHPOS\Architecture\Operation\x86_64\Entities\Vscalefpd::class;
    case VSCALEFPH = \PHPOS\Architecture\Operation\x86_64\Entities\Vscalefph::class;
    case VSCALEFPS = \PHPOS\Architecture\Operation\x86_64\Entities\Vscalefps::class;
    case VSCALEFSD = \PHPOS\Architecture\Operation\x86_64\Entities\Vscalefsd::class;
    case VSCALEFSH = \PHPOS\Architecture\Operation\x86_64\Entities\Vscalefsh::class;
    case VSCALEFSS = \PHPOS\Architecture\Operation\x86_64\Entities\Vscalefss::class;
    case VSCATTERDPD = \PHPOS\Architecture\Operation\x86_64\Entities\Vscatterdpd::class;
    case VSCATTERDPS = \PHPOS\Architecture\Operation\x86_64\Entities\Vscatterdps::class;
    case VSCATTERQPD = \PHPOS\Architecture\Operation\x86_64\Entities\Vscatterqpd::class;
    case VSCATTERQPS = \PHPOS\Architecture\Operation\x86_64\Entities\Vscatterqps::class;
    case VSHUFF32X4 = \PHPOS\Architecture\Operation\x86_64\Entities\Vshuff32x4::class;
    case VSHUFF64X2 = \PHPOS\Architecture\Operation\x86_64\Entities\Vshuff64x2::class;
    case VSHUFI32X4 = \PHPOS\Architecture\Operation\x86_64\Entities\Vshufi32x4::class;
    case VSHUFI64X2 = \PHPOS\Architecture\Operation\x86_64\Entities\Vshufi64x2::class;
    case VSQRTPH = \PHPOS\Architecture\Operation\x86_64\Entities\Vsqrtph::class;
    case VSQRTSH = \PHPOS\Architecture\Operation\x86_64\Entities\Vsqrtsh::class;
    case VSUBPH = \PHPOS\Architecture\Operation\x86_64\Entities\Vsubph::class;
    case VSUBSH = \PHPOS\Architecture\Operation\x86_64\Entities\Vsubsh::class;
    case VTESTPD = \PHPOS\Architecture\Operation\x86_64\Entities\Vtestpd::class;
    case VTESTPS = \PHPOS\Architecture\Operation\x86_64\Entities\Vtestps::class;
    case VUCOMISH = \PHPOS\Architecture\Operation\x86_64\Entities\Vucomish::class;
    case VZEROALL = \PHPOS\Architecture\Operation\x86_64\Entities\Vzeroall::class;
    case VZEROUPPER = \PHPOS\Architecture\Operation\x86_64\Entities\Vzeroupper::class;
    case WAIT = \PHPOS\Architecture\Operation\x86_64\Entities\Wait::class;
    case WBINVD = \PHPOS\Architecture\Operation\x86_64\Entities\Wbinvd::class;
    case WBNOINVD = \PHPOS\Architecture\Operation\x86_64\Entities\Wbnoinvd::class;
    case WRFSBASE = \PHPOS\Architecture\Operation\x86_64\Entities\Wrfsbase::class;
    case WRGSBASE = \PHPOS\Architecture\Operation\x86_64\Entities\Wrgsbase::class;
    case WRMSR = \PHPOS\Architecture\Operation\x86_64\Entities\Wrmsr::class;
    case WRPKRU = \PHPOS\Architecture\Operation\x86_64\Entities\Wrpkru::class;
    case WRSSD = \PHPOS\Architecture\Operation\x86_64\Entities\Wrssd::class;
    case WRSSQ = \PHPOS\Architecture\Operation\x86_64\Entities\Wrssq::class;
    case WRUSSD = \PHPOS\Architecture\Operation\x86_64\Entities\Wrussd::class;
    case WRUSSQ = \PHPOS\Architecture\Operation\x86_64\Entities\Wrussq::class;
    case XABORT = \PHPOS\Architecture\Operation\x86_64\Entities\Xabort::class;
    case XACQUIRE = \PHPOS\Architecture\Operation\x86_64\Entities\Xacquire::class;
    case XADD = \PHPOS\Architecture\Operation\x86_64\Entities\Xadd::class;
    case XBEGIN = \PHPOS\Architecture\Operation\x86_64\Entities\Xbegin::class;
    case XCHG = \PHPOS\Architecture\Operation\x86_64\Entities\Xchg::class;
    case XEND = \PHPOS\Architecture\Operation\x86_64\Entities\Xend::class;
    case XGETBV = \PHPOS\Architecture\Operation\x86_64\Entities\Xgetbv::class;
    case XLAT = \PHPOS\Architecture\Operation\x86_64\Entities\Xlat::class;
    case XLATB = \PHPOS\Architecture\Operation\x86_64\Entities\Xlatb::class;
    case XOR_ = \PHPOS\Architecture\Operation\x86_64\Entities\Xor_::class;
    case XORPD = \PHPOS\Architecture\Operation\x86_64\Entities\Xorpd::class;
    case XORPS = \PHPOS\Architecture\Operation\x86_64\Entities\Xorps::class;
    case XRELEASE = \PHPOS\Architecture\Operation\x86_64\Entities\Xrelease::class;
    case XRESLDTRK = \PHPOS\Architecture\Operation\x86_64\Entities\Xresldtrk::class;
    case XRSTOR = \PHPOS\Architecture\Operation\x86_64\Entities\Xrstor::class;
    case XRSTORS = \PHPOS\Architecture\Operation\x86_64\Entities\Xrstors::class;
    case XSAVE = \PHPOS\Architecture\Operation\x86_64\Entities\Xsave::class;
    case XSAVEC = \PHPOS\Architecture\Operation\x86_64\Entities\Xsavec::class;
    case XSAVEOPT = \PHPOS\Architecture\Operation\x86_64\Entities\Xsaveopt::class;
    case XSAVES = \PHPOS\Architecture\Operation\x86_64\Entities\Xsaves::class;
    case XSETBV = \PHPOS\Architecture\Operation\x86_64\Entities\Xsetbv::class;
    case XSUSLDTRK = \PHPOS\Architecture\Operation\x86_64\Entities\Xsusldtrk::class;
    case XTEST = \PHPOS\Architecture\Operation\x86_64\Entities\Xtest::class;

    public function realName(): string
    {
        return rtrim(strtolower($this->name), '_');
    }

    public static function operations(): OperationCollection
    {
        return (new OperationCollection())
            ->bind(OperationType::AAA, self::AAA)
            ->bind(OperationType::AAD, self::AAD)
            ->bind(OperationType::AAM, self::AAM)
            ->bind(OperationType::AAS, self::AAS)
            ->bind(OperationType::ADC, self::ADC)
            ->bind(OperationType::ADCX, self::ADCX)
            ->bind(OperationType::ADD, self::ADD)
            ->bind(OperationType::ADDPD, self::ADDPD)
            ->bind(OperationType::ADDPS, self::ADDPS)
            ->bind(OperationType::ADDSD, self::ADDSD)
            ->bind(OperationType::ADDSS, self::ADDSS)
            ->bind(OperationType::ADDSUBPD, self::ADDSUBPD)
            ->bind(OperationType::ADDSUBPS, self::ADDSUBPS)
            ->bind(OperationType::ADOX, self::ADOX)
            ->bind(OperationType::AESDEC, self::AESDEC)
            ->bind(OperationType::AESDEC128KL, self::AESDEC128KL)
            ->bind(OperationType::AESDEC256KL, self::AESDEC256KL)
            ->bind(OperationType::AESDECLAST, self::AESDECLAST)
            ->bind(OperationType::AESDECWIDE128KL, self::AESDECWIDE128KL)
            ->bind(OperationType::AESDECWIDE256KL, self::AESDECWIDE256KL)
            ->bind(OperationType::AESENC, self::AESENC)
            ->bind(OperationType::AESENC128KL, self::AESENC128KL)
            ->bind(OperationType::AESENC256KL, self::AESENC256KL)
            ->bind(OperationType::AESENCLAST, self::AESENCLAST)
            ->bind(OperationType::AESENCWIDE128KL, self::AESENCWIDE128KL)
            ->bind(OperationType::AESENCWIDE256KL, self::AESENCWIDE256KL)
            ->bind(OperationType::AESIMC, self::AESIMC)
            ->bind(OperationType::AESKEYGENASSIST, self::AESKEYGENASSIST)
            ->bind(OperationType::AND_, self::AND_)
            ->bind(OperationType::ANDN, self::ANDN)
            ->bind(OperationType::ANDNPD, self::ANDNPD)
            ->bind(OperationType::ANDNPS, self::ANDNPS)
            ->bind(OperationType::ANDPD, self::ANDPD)
            ->bind(OperationType::ANDPS, self::ANDPS)
            ->bind(OperationType::ARPL, self::ARPL)
            ->bind(OperationType::BEXTR, self::BEXTR)
            ->bind(OperationType::BLENDPD, self::BLENDPD)
            ->bind(OperationType::BLENDPS, self::BLENDPS)
            ->bind(OperationType::BLENDVPD, self::BLENDVPD)
            ->bind(OperationType::BLENDVPS, self::BLENDVPS)
            ->bind(OperationType::BLSI, self::BLSI)
            ->bind(OperationType::BLSMSK, self::BLSMSK)
            ->bind(OperationType::BLSR, self::BLSR)
            ->bind(OperationType::BNDCL, self::BNDCL)
            ->bind(OperationType::BNDCN, self::BNDCN)
            ->bind(OperationType::BNDCU, self::BNDCU)
            ->bind(OperationType::BNDLDX, self::BNDLDX)
            ->bind(OperationType::BNDMK, self::BNDMK)
            ->bind(OperationType::BNDMOV, self::BNDMOV)
            ->bind(OperationType::BNDSTX, self::BNDSTX)
            ->bind(OperationType::BOUND, self::BOUND)
            ->bind(OperationType::BSF, self::BSF)
            ->bind(OperationType::BSR, self::BSR)
            ->bind(OperationType::BSWAP, self::BSWAP)
            ->bind(OperationType::BT, self::BT)
            ->bind(OperationType::BTC, self::BTC)
            ->bind(OperationType::BTR, self::BTR)
            ->bind(OperationType::BTS, self::BTS)
            ->bind(OperationType::BZHI, self::BZHI)
            ->bind(OperationType::CALL, self::CALL)
            ->bind(OperationType::CBW, self::CBW)
            ->bind(OperationType::CDQ, self::CDQ)
            ->bind(OperationType::CDQE, self::CDQE)
            ->bind(OperationType::CLAC, self::CLAC)
            ->bind(OperationType::CLC, self::CLC)
            ->bind(OperationType::CLD, self::CLD)
            ->bind(OperationType::CLDEMOTE, self::CLDEMOTE)
            ->bind(OperationType::CLFLUSH, self::CLFLUSH)
            ->bind(OperationType::CLFLUSHOPT, self::CLFLUSHOPT)
            ->bind(OperationType::CLI, self::CLI)
            ->bind(OperationType::CLRSSBSY, self::CLRSSBSY)
            ->bind(OperationType::CLTS, self::CLTS)
            ->bind(OperationType::CLUI, self::CLUI)
            ->bind(OperationType::CLWB, self::CLWB)
            ->bind(OperationType::CMC, self::CMC)
            ->bind(OperationType::CMOVCC, self::CMOVCC)
            ->bind(OperationType::CMP, self::CMP)
            ->bind(OperationType::CMPPD, self::CMPPD)
            ->bind(OperationType::CMPPS, self::CMPPS)
            ->bind(OperationType::CMPS, self::CMPS)
            ->bind(OperationType::CMPSB, self::CMPSB)
            ->bind(OperationType::CMPSD, self::CMPSD)
            ->bind(OperationType::CMPSQ, self::CMPSQ)
            ->bind(OperationType::CMPSS, self::CMPSS)
            ->bind(OperationType::CMPSW, self::CMPSW)
            ->bind(OperationType::CMPXCHG, self::CMPXCHG)
            ->bind(OperationType::CMPXCHG16B, self::CMPXCHG16B)
            ->bind(OperationType::CMPXCHG8B, self::CMPXCHG8B)
            ->bind(OperationType::COMISD, self::COMISD)
            ->bind(OperationType::COMISS, self::COMISS)
            ->bind(OperationType::CPUID, self::CPUID)
            ->bind(OperationType::CQO, self::CQO)
            ->bind(OperationType::CRC32, self::CRC32)
            ->bind(OperationType::CVTDQ2PD, self::CVTDQ2PD)
            ->bind(OperationType::CVTDQ2PS, self::CVTDQ2PS)
            ->bind(OperationType::CVTPD2DQ, self::CVTPD2DQ)
            ->bind(OperationType::CVTPD2PI, self::CVTPD2PI)
            ->bind(OperationType::CVTPD2PS, self::CVTPD2PS)
            ->bind(OperationType::CVTPI2PD, self::CVTPI2PD)
            ->bind(OperationType::CVTPI2PS, self::CVTPI2PS)
            ->bind(OperationType::CVTPS2DQ, self::CVTPS2DQ)
            ->bind(OperationType::CVTPS2PD, self::CVTPS2PD)
            ->bind(OperationType::CVTPS2PI, self::CVTPS2PI)
            ->bind(OperationType::CVTSD2SI, self::CVTSD2SI)
            ->bind(OperationType::CVTSD2SS, self::CVTSD2SS)
            ->bind(OperationType::CVTSI2SD, self::CVTSI2SD)
            ->bind(OperationType::CVTSI2SS, self::CVTSI2SS)
            ->bind(OperationType::CVTSS2SD, self::CVTSS2SD)
            ->bind(OperationType::CVTSS2SI, self::CVTSS2SI)
            ->bind(OperationType::CVTTPD2DQ, self::CVTTPD2DQ)
            ->bind(OperationType::CVTTPD2PI, self::CVTTPD2PI)
            ->bind(OperationType::CVTTPS2DQ, self::CVTTPS2DQ)
            ->bind(OperationType::CVTTPS2PI, self::CVTTPS2PI)
            ->bind(OperationType::CVTTSD2SI, self::CVTTSD2SI)
            ->bind(OperationType::CVTTSS2SI, self::CVTTSS2SI)
            ->bind(OperationType::CWD, self::CWD)
            ->bind(OperationType::CWDE, self::CWDE)
            ->bind(OperationType::DAA, self::DAA)
            ->bind(OperationType::DAS, self::DAS)
            ->bind(OperationType::DEC, self::DEC)
            ->bind(OperationType::DIV, self::DIV)
            ->bind(OperationType::DIVPD, self::DIVPD)
            ->bind(OperationType::DIVPS, self::DIVPS)
            ->bind(OperationType::DIVSD, self::DIVSD)
            ->bind(OperationType::DIVSS, self::DIVSS)
            ->bind(OperationType::DPPD, self::DPPD)
            ->bind(OperationType::DPPS, self::DPPS)
            ->bind(OperationType::EMMS, self::EMMS)
            ->bind(OperationType::ENCODEKEY128, self::ENCODEKEY128)
            ->bind(OperationType::ENCODEKEY256, self::ENCODEKEY256)
            ->bind(OperationType::ENDBR32, self::ENDBR32)
            ->bind(OperationType::ENDBR64, self::ENDBR64)
            ->bind(OperationType::ENQCMD, self::ENQCMD)
            ->bind(OperationType::ENQCMDS, self::ENQCMDS)
            ->bind(OperationType::ENTER, self::ENTER)
            ->bind(OperationType::EXTRACTPS, self::EXTRACTPS)
            ->bind(OperationType::F2XM1, self::F2XM1)
            ->bind(OperationType::FABS, self::FABS)
            ->bind(OperationType::FADD, self::FADD)
            ->bind(OperationType::FADDP, self::FADDP)
            ->bind(OperationType::FBLD, self::FBLD)
            ->bind(OperationType::FBSTP, self::FBSTP)
            ->bind(OperationType::FCHS, self::FCHS)
            ->bind(OperationType::FCLEX, self::FCLEX)
            ->bind(OperationType::FCMOVCC, self::FCMOVCC)
            ->bind(OperationType::FCOM, self::FCOM)
            ->bind(OperationType::FCOMI, self::FCOMI)
            ->bind(OperationType::FCOMIP, self::FCOMIP)
            ->bind(OperationType::FCOMP, self::FCOMP)
            ->bind(OperationType::FCOMPP, self::FCOMPP)
            ->bind(OperationType::FCOS, self::FCOS)
            ->bind(OperationType::FDECSTP, self::FDECSTP)
            ->bind(OperationType::FDIV, self::FDIV)
            ->bind(OperationType::FDIVP, self::FDIVP)
            ->bind(OperationType::FDIVR, self::FDIVR)
            ->bind(OperationType::FDIVRP, self::FDIVRP)
            ->bind(OperationType::FFREE, self::FFREE)
            ->bind(OperationType::FIADD, self::FIADD)
            ->bind(OperationType::FICOM, self::FICOM)
            ->bind(OperationType::FICOMP, self::FICOMP)
            ->bind(OperationType::FIDIV, self::FIDIV)
            ->bind(OperationType::FIDIVR, self::FIDIVR)
            ->bind(OperationType::FILD, self::FILD)
            ->bind(OperationType::FIMUL, self::FIMUL)
            ->bind(OperationType::FINCSTP, self::FINCSTP)
            ->bind(OperationType::FINIT, self::FINIT)
            ->bind(OperationType::FIST, self::FIST)
            ->bind(OperationType::FISTP, self::FISTP)
            ->bind(OperationType::FISTTP, self::FISTTP)
            ->bind(OperationType::FISUB, self::FISUB)
            ->bind(OperationType::FISUBR, self::FISUBR)
            ->bind(OperationType::FLD, self::FLD)
            ->bind(OperationType::FLD1, self::FLD1)
            ->bind(OperationType::FLDCW, self::FLDCW)
            ->bind(OperationType::FLDENV, self::FLDENV)
            ->bind(OperationType::FLDL2E, self::FLDL2E)
            ->bind(OperationType::FLDL2T, self::FLDL2T)
            ->bind(OperationType::FLDLG2, self::FLDLG2)
            ->bind(OperationType::FLDLN2, self::FLDLN2)
            ->bind(OperationType::FLDPI, self::FLDPI)
            ->bind(OperationType::FLDZ, self::FLDZ)
            ->bind(OperationType::FMUL, self::FMUL)
            ->bind(OperationType::FMULP, self::FMULP)
            ->bind(OperationType::FNCLEX, self::FNCLEX)
            ->bind(OperationType::FNINIT, self::FNINIT)
            ->bind(OperationType::FNOP, self::FNOP)
            ->bind(OperationType::FNSAVE, self::FNSAVE)
            ->bind(OperationType::FNSTCW, self::FNSTCW)
            ->bind(OperationType::FNSTENV, self::FNSTENV)
            ->bind(OperationType::FNSTSW, self::FNSTSW)
            ->bind(OperationType::FPATAN, self::FPATAN)
            ->bind(OperationType::FPREM, self::FPREM)
            ->bind(OperationType::FPREM1, self::FPREM1)
            ->bind(OperationType::FPTAN, self::FPTAN)
            ->bind(OperationType::FRNDINT, self::FRNDINT)
            ->bind(OperationType::FRSTOR, self::FRSTOR)
            ->bind(OperationType::FSAVE, self::FSAVE)
            ->bind(OperationType::FSCALE, self::FSCALE)
            ->bind(OperationType::FSIN, self::FSIN)
            ->bind(OperationType::FSINCOS, self::FSINCOS)
            ->bind(OperationType::FSQRT, self::FSQRT)
            ->bind(OperationType::FST, self::FST)
            ->bind(OperationType::FSTCW, self::FSTCW)
            ->bind(OperationType::FSTENV, self::FSTENV)
            ->bind(OperationType::FSTP, self::FSTP)
            ->bind(OperationType::FSTSW, self::FSTSW)
            ->bind(OperationType::FSUB, self::FSUB)
            ->bind(OperationType::FSUBP, self::FSUBP)
            ->bind(OperationType::FSUBR, self::FSUBR)
            ->bind(OperationType::FSUBRP, self::FSUBRP)
            ->bind(OperationType::FTST, self::FTST)
            ->bind(OperationType::FUCOM, self::FUCOM)
            ->bind(OperationType::FUCOMI, self::FUCOMI)
            ->bind(OperationType::FUCOMIP, self::FUCOMIP)
            ->bind(OperationType::FUCOMP, self::FUCOMP)
            ->bind(OperationType::FUCOMPP, self::FUCOMPP)
            ->bind(OperationType::FWAIT, self::FWAIT)
            ->bind(OperationType::FXAM, self::FXAM)
            ->bind(OperationType::FXCH, self::FXCH)
            ->bind(OperationType::FXRSTOR, self::FXRSTOR)
            ->bind(OperationType::FXSAVE, self::FXSAVE)
            ->bind(OperationType::FXTRACT, self::FXTRACT)
            ->bind(OperationType::FYL2X, self::FYL2X)
            ->bind(OperationType::FYL2XP1, self::FYL2XP1)
            ->bind(OperationType::GF2P8AFFINEINVQB, self::GF2P8AFFINEINVQB)
            ->bind(OperationType::GF2P8AFFINEQB, self::GF2P8AFFINEQB)
            ->bind(OperationType::GF2P8MULB, self::GF2P8MULB)
            ->bind(OperationType::HADDPD, self::HADDPD)
            ->bind(OperationType::HADDPS, self::HADDPS)
            ->bind(OperationType::HLT, self::HLT)
            ->bind(OperationType::HRESET, self::HRESET)
            ->bind(OperationType::HSUBPD, self::HSUBPD)
            ->bind(OperationType::HSUBPS, self::HSUBPS)
            ->bind(OperationType::IDIV, self::IDIV)
            ->bind(OperationType::IMUL, self::IMUL)
            ->bind(OperationType::IN, self::IN)
            ->bind(OperationType::INC, self::INC)
            ->bind(OperationType::INCSSPD, self::INCSSPD)
            ->bind(OperationType::INCSSPQ, self::INCSSPQ)
            ->bind(OperationType::INS, self::INS)
            ->bind(OperationType::INSB, self::INSB)
            ->bind(OperationType::INSD, self::INSD)
            ->bind(OperationType::INSERTPS, self::INSERTPS)
            ->bind(OperationType::INSW, self::INSW)
            ->bind(OperationType::INT_, self::INT_)
            ->bind(OperationType::INT1, self::INT1)
            ->bind(OperationType::INT3, self::INT3)
            ->bind(OperationType::INTO, self::INTO)
            ->bind(OperationType::INVD, self::INVD)
            ->bind(OperationType::INVLPG, self::INVLPG)
            ->bind(OperationType::INVPCID, self::INVPCID)
            ->bind(OperationType::IRET, self::IRET)
            ->bind(OperationType::IRETD, self::IRETD)
            ->bind(OperationType::IRETQ, self::IRETQ)
            ->bind(OperationType::JMP, self::JMP)
            ->bind(OperationType::JCC, self::JCC)
            ->bind(OperationType::KADDB, self::KADDB)
            ->bind(OperationType::KADDD, self::KADDD)
            ->bind(OperationType::KADDQ, self::KADDQ)
            ->bind(OperationType::KADDW, self::KADDW)
            ->bind(OperationType::KANDB, self::KANDB)
            ->bind(OperationType::KANDD, self::KANDD)
            ->bind(OperationType::KANDNB, self::KANDNB)
            ->bind(OperationType::KANDND, self::KANDND)
            ->bind(OperationType::KANDNQ, self::KANDNQ)
            ->bind(OperationType::KANDNW, self::KANDNW)
            ->bind(OperationType::KANDQ, self::KANDQ)
            ->bind(OperationType::KANDW, self::KANDW)
            ->bind(OperationType::KMOVB, self::KMOVB)
            ->bind(OperationType::KMOVD, self::KMOVD)
            ->bind(OperationType::KMOVQ, self::KMOVQ)
            ->bind(OperationType::KMOVW, self::KMOVW)
            ->bind(OperationType::KNOTB, self::KNOTB)
            ->bind(OperationType::KNOTD, self::KNOTD)
            ->bind(OperationType::KNOTQ, self::KNOTQ)
            ->bind(OperationType::KNOTW, self::KNOTW)
            ->bind(OperationType::KORB, self::KORB)
            ->bind(OperationType::KORD, self::KORD)
            ->bind(OperationType::KORQ, self::KORQ)
            ->bind(OperationType::KORTESTB, self::KORTESTB)
            ->bind(OperationType::KORTESTD, self::KORTESTD)
            ->bind(OperationType::KORTESTQ, self::KORTESTQ)
            ->bind(OperationType::KORTESTW, self::KORTESTW)
            ->bind(OperationType::KORW, self::KORW)
            ->bind(OperationType::KSHIFTLB, self::KSHIFTLB)
            ->bind(OperationType::KSHIFTLD, self::KSHIFTLD)
            ->bind(OperationType::KSHIFTLQ, self::KSHIFTLQ)
            ->bind(OperationType::KSHIFTLW, self::KSHIFTLW)
            ->bind(OperationType::KSHIFTRB, self::KSHIFTRB)
            ->bind(OperationType::KSHIFTRD, self::KSHIFTRD)
            ->bind(OperationType::KSHIFTRQ, self::KSHIFTRQ)
            ->bind(OperationType::KSHIFTRW, self::KSHIFTRW)
            ->bind(OperationType::KTESTB, self::KTESTB)
            ->bind(OperationType::KTESTD, self::KTESTD)
            ->bind(OperationType::KTESTQ, self::KTESTQ)
            ->bind(OperationType::KTESTW, self::KTESTW)
            ->bind(OperationType::KUNPCKBW, self::KUNPCKBW)
            ->bind(OperationType::KUNPCKDQ, self::KUNPCKDQ)
            ->bind(OperationType::KUNPCKWD, self::KUNPCKWD)
            ->bind(OperationType::KXNORB, self::KXNORB)
            ->bind(OperationType::KXNORD, self::KXNORD)
            ->bind(OperationType::KXNORQ, self::KXNORQ)
            ->bind(OperationType::KXNORW, self::KXNORW)
            ->bind(OperationType::KXORB, self::KXORB)
            ->bind(OperationType::KXORD, self::KXORD)
            ->bind(OperationType::KXORQ, self::KXORQ)
            ->bind(OperationType::KXORW, self::KXORW)
            ->bind(OperationType::LAHF, self::LAHF)
            ->bind(OperationType::LAR, self::LAR)
            ->bind(OperationType::LDDQU, self::LDDQU)
            ->bind(OperationType::LDMXCSR, self::LDMXCSR)
            ->bind(OperationType::LDS, self::LDS)
            ->bind(OperationType::LDTILECFG, self::LDTILECFG)
            ->bind(OperationType::LEA, self::LEA)
            ->bind(OperationType::LEAVE, self::LEAVE)
            ->bind(OperationType::LES, self::LES)
            ->bind(OperationType::LFENCE, self::LFENCE)
            ->bind(OperationType::LFS, self::LFS)
            ->bind(OperationType::LGDT, self::LGDT)
            ->bind(OperationType::LGS, self::LGS)
            ->bind(OperationType::LIDT, self::LIDT)
            ->bind(OperationType::LLDT, self::LLDT)
            ->bind(OperationType::LMSW, self::LMSW)
            ->bind(OperationType::LOADIWKEY, self::LOADIWKEY)
            ->bind(OperationType::LOCK, self::LOCK)
            ->bind(OperationType::LODS, self::LODS)
            ->bind(OperationType::LODSB, self::LODSB)
            ->bind(OperationType::LODSD, self::LODSD)
            ->bind(OperationType::LODSQ, self::LODSQ)
            ->bind(OperationType::LODSW, self::LODSW)
            ->bind(OperationType::LOOP, self::LOOP)
            ->bind(OperationType::LOOPCC, self::LOOPCC)
            ->bind(OperationType::LSL, self::LSL)
            ->bind(OperationType::LSS, self::LSS)
            ->bind(OperationType::LTR, self::LTR)
            ->bind(OperationType::LZCNT, self::LZCNT)
            ->bind(OperationType::MASKMOVDQU, self::MASKMOVDQU)
            ->bind(OperationType::MASKMOVQ, self::MASKMOVQ)
            ->bind(OperationType::MAXPD, self::MAXPD)
            ->bind(OperationType::MAXPS, self::MAXPS)
            ->bind(OperationType::MAXSD, self::MAXSD)
            ->bind(OperationType::MAXSS, self::MAXSS)
            ->bind(OperationType::MFENCE, self::MFENCE)
            ->bind(OperationType::MINPD, self::MINPD)
            ->bind(OperationType::MINPS, self::MINPS)
            ->bind(OperationType::MINSD, self::MINSD)
            ->bind(OperationType::MINSS, self::MINSS)
            ->bind(OperationType::MONITOR, self::MONITOR)
            ->bind(OperationType::MOV, self::MOV)
            ->bind(OperationType::MOVAPD, self::MOVAPD)
            ->bind(OperationType::MOVAPS, self::MOVAPS)
            ->bind(OperationType::MOVBE, self::MOVBE)
            ->bind(OperationType::MOVD, self::MOVD)
            ->bind(OperationType::MOVDDUP, self::MOVDDUP)
            ->bind(OperationType::MOVDIR64B, self::MOVDIR64B)
            ->bind(OperationType::MOVDIRI, self::MOVDIRI)
            ->bind(OperationType::MOVDQ2Q, self::MOVDQ2Q)
            ->bind(OperationType::MOVDQA, self::MOVDQA)
            ->bind(OperationType::MOVDQU, self::MOVDQU)
            ->bind(OperationType::MOVHLPS, self::MOVHLPS)
            ->bind(OperationType::MOVHPD, self::MOVHPD)
            ->bind(OperationType::MOVHPS, self::MOVHPS)
            ->bind(OperationType::MOVLHPS, self::MOVLHPS)
            ->bind(OperationType::MOVLPD, self::MOVLPD)
            ->bind(OperationType::MOVLPS, self::MOVLPS)
            ->bind(OperationType::MOVMSKPD, self::MOVMSKPD)
            ->bind(OperationType::MOVMSKPS, self::MOVMSKPS)
            ->bind(OperationType::MOVNTDQ, self::MOVNTDQ)
            ->bind(OperationType::MOVNTDQA, self::MOVNTDQA)
            ->bind(OperationType::MOVNTI, self::MOVNTI)
            ->bind(OperationType::MOVNTPD, self::MOVNTPD)
            ->bind(OperationType::MOVNTPS, self::MOVNTPS)
            ->bind(OperationType::MOVNTQ, self::MOVNTQ)
            ->bind(OperationType::MOVQ, self::MOVQ)
            ->bind(OperationType::MOVQ2DQ, self::MOVQ2DQ)
            ->bind(OperationType::MOVS, self::MOVS)
            ->bind(OperationType::MOVSB, self::MOVSB)
            ->bind(OperationType::MOVSD, self::MOVSD)
            ->bind(OperationType::MOVSHDUP, self::MOVSHDUP)
            ->bind(OperationType::MOVSLDUP, self::MOVSLDUP)
            ->bind(OperationType::MOVSQ, self::MOVSQ)
            ->bind(OperationType::MOVSS, self::MOVSS)
            ->bind(OperationType::MOVSW, self::MOVSW)
            ->bind(OperationType::MOVSX, self::MOVSX)
            ->bind(OperationType::MOVSXD, self::MOVSXD)
            ->bind(OperationType::MOVUPD, self::MOVUPD)
            ->bind(OperationType::MOVUPS, self::MOVUPS)
            ->bind(OperationType::MOVZX, self::MOVZX)
            ->bind(OperationType::MPSADBW, self::MPSADBW)
            ->bind(OperationType::MUL, self::MUL)
            ->bind(OperationType::MULPD, self::MULPD)
            ->bind(OperationType::MULPS, self::MULPS)
            ->bind(OperationType::MULSD, self::MULSD)
            ->bind(OperationType::MULSS, self::MULSS)
            ->bind(OperationType::MULX, self::MULX)
            ->bind(OperationType::MWAIT, self::MWAIT)
            ->bind(OperationType::NEG, self::NEG)
            ->bind(OperationType::NOP, self::NOP)
            ->bind(OperationType::NOT, self::NOT)
            ->bind(OperationType::OR_, self::OR_)
            ->bind(OperationType::ORPD, self::ORPD)
            ->bind(OperationType::ORPS, self::ORPS)
            ->bind(OperationType::OUT, self::OUT)
            ->bind(OperationType::OUTS, self::OUTS)
            ->bind(OperationType::OUTSB, self::OUTSB)
            ->bind(OperationType::OUTSD, self::OUTSD)
            ->bind(OperationType::OUTSW, self::OUTSW)
            ->bind(OperationType::PABSB, self::PABSB)
            ->bind(OperationType::PABSD, self::PABSD)
            ->bind(OperationType::PABSQ, self::PABSQ)
            ->bind(OperationType::PABSW, self::PABSW)
            ->bind(OperationType::PACKSSDW, self::PACKSSDW)
            ->bind(OperationType::PACKSSWB, self::PACKSSWB)
            ->bind(OperationType::PACKUSDW, self::PACKUSDW)
            ->bind(OperationType::PACKUSWB, self::PACKUSWB)
            ->bind(OperationType::PADDB, self::PADDB)
            ->bind(OperationType::PADDD, self::PADDD)
            ->bind(OperationType::PADDQ, self::PADDQ)
            ->bind(OperationType::PADDSB, self::PADDSB)
            ->bind(OperationType::PADDSW, self::PADDSW)
            ->bind(OperationType::PADDUSB, self::PADDUSB)
            ->bind(OperationType::PADDUSW, self::PADDUSW)
            ->bind(OperationType::PADDW, self::PADDW)
            ->bind(OperationType::PALIGNR, self::PALIGNR)
            ->bind(OperationType::PAND, self::PAND)
            ->bind(OperationType::PANDN, self::PANDN)
            ->bind(OperationType::PAUSE, self::PAUSE)
            ->bind(OperationType::PAVGB, self::PAVGB)
            ->bind(OperationType::PAVGW, self::PAVGW)
            ->bind(OperationType::PBLENDVB, self::PBLENDVB)
            ->bind(OperationType::PBLENDW, self::PBLENDW)
            ->bind(OperationType::PCLMULQDQ, self::PCLMULQDQ)
            ->bind(OperationType::PCMPEQB, self::PCMPEQB)
            ->bind(OperationType::PCMPEQD, self::PCMPEQD)
            ->bind(OperationType::PCMPEQQ, self::PCMPEQQ)
            ->bind(OperationType::PCMPEQW, self::PCMPEQW)
            ->bind(OperationType::PCMPESTRI, self::PCMPESTRI)
            ->bind(OperationType::PCMPESTRM, self::PCMPESTRM)
            ->bind(OperationType::PCMPGTB, self::PCMPGTB)
            ->bind(OperationType::PCMPGTD, self::PCMPGTD)
            ->bind(OperationType::PCMPGTQ, self::PCMPGTQ)
            ->bind(OperationType::PCMPGTW, self::PCMPGTW)
            ->bind(OperationType::PCMPISTRI, self::PCMPISTRI)
            ->bind(OperationType::PCMPISTRM, self::PCMPISTRM)
            ->bind(OperationType::PCONFIG, self::PCONFIG)
            ->bind(OperationType::PDEP, self::PDEP)
            ->bind(OperationType::PEXT, self::PEXT)
            ->bind(OperationType::PEXTRB, self::PEXTRB)
            ->bind(OperationType::PEXTRD, self::PEXTRD)
            ->bind(OperationType::PEXTRQ, self::PEXTRQ)
            ->bind(OperationType::PEXTRW, self::PEXTRW)
            ->bind(OperationType::PHADDD, self::PHADDD)
            ->bind(OperationType::PHADDSW, self::PHADDSW)
            ->bind(OperationType::PHADDW, self::PHADDW)
            ->bind(OperationType::PHMINPOSUW, self::PHMINPOSUW)
            ->bind(OperationType::PHSUBD, self::PHSUBD)
            ->bind(OperationType::PHSUBSW, self::PHSUBSW)
            ->bind(OperationType::PHSUBW, self::PHSUBW)
            ->bind(OperationType::PINSRB, self::PINSRB)
            ->bind(OperationType::PINSRD, self::PINSRD)
            ->bind(OperationType::PINSRQ, self::PINSRQ)
            ->bind(OperationType::PINSRW, self::PINSRW)
            ->bind(OperationType::PMADDUBSW, self::PMADDUBSW)
            ->bind(OperationType::PMADDWD, self::PMADDWD)
            ->bind(OperationType::PMAXSB, self::PMAXSB)
            ->bind(OperationType::PMAXSD, self::PMAXSD)
            ->bind(OperationType::PMAXSQ, self::PMAXSQ)
            ->bind(OperationType::PMAXSW, self::PMAXSW)
            ->bind(OperationType::PMAXUB, self::PMAXUB)
            ->bind(OperationType::PMAXUD, self::PMAXUD)
            ->bind(OperationType::PMAXUQ, self::PMAXUQ)
            ->bind(OperationType::PMAXUW, self::PMAXUW)
            ->bind(OperationType::PMINSB, self::PMINSB)
            ->bind(OperationType::PMINSD, self::PMINSD)
            ->bind(OperationType::PMINSQ, self::PMINSQ)
            ->bind(OperationType::PMINSW, self::PMINSW)
            ->bind(OperationType::PMINUB, self::PMINUB)
            ->bind(OperationType::PMINUD, self::PMINUD)
            ->bind(OperationType::PMINUQ, self::PMINUQ)
            ->bind(OperationType::PMINUW, self::PMINUW)
            ->bind(OperationType::PMOVMSKB, self::PMOVMSKB)
            ->bind(OperationType::PMOVSX, self::PMOVSX)
            ->bind(OperationType::PMOVZX, self::PMOVZX)
            ->bind(OperationType::PMULDQ, self::PMULDQ)
            ->bind(OperationType::PMULHRSW, self::PMULHRSW)
            ->bind(OperationType::PMULHUW, self::PMULHUW)
            ->bind(OperationType::PMULHW, self::PMULHW)
            ->bind(OperationType::PMULLD, self::PMULLD)
            ->bind(OperationType::PMULLQ, self::PMULLQ)
            ->bind(OperationType::PMULLW, self::PMULLW)
            ->bind(OperationType::PMULUDQ, self::PMULUDQ)
            ->bind(OperationType::POP, self::POP)
            ->bind(OperationType::POPA, self::POPA)
            ->bind(OperationType::POPAD, self::POPAD)
            ->bind(OperationType::POPCNT, self::POPCNT)
            ->bind(OperationType::POPF, self::POPF)
            ->bind(OperationType::POPFD, self::POPFD)
            ->bind(OperationType::POPFQ, self::POPFQ)
            ->bind(OperationType::POR, self::POR)
            ->bind(OperationType::PREFETCHW, self::PREFETCHW)
            ->bind(OperationType::PREFETCHH, self::PREFETCHH)
            ->bind(OperationType::PSADBW, self::PSADBW)
            ->bind(OperationType::PSHUFB, self::PSHUFB)
            ->bind(OperationType::PSHUFD, self::PSHUFD)
            ->bind(OperationType::PSHUFHW, self::PSHUFHW)
            ->bind(OperationType::PSHUFLW, self::PSHUFLW)
            ->bind(OperationType::PSHUFW, self::PSHUFW)
            ->bind(OperationType::PSIGNB, self::PSIGNB)
            ->bind(OperationType::PSIGND, self::PSIGND)
            ->bind(OperationType::PSIGNW, self::PSIGNW)
            ->bind(OperationType::PSLLD, self::PSLLD)
            ->bind(OperationType::PSLLDQ, self::PSLLDQ)
            ->bind(OperationType::PSLLQ, self::PSLLQ)
            ->bind(OperationType::PSLLW, self::PSLLW)
            ->bind(OperationType::PSRAD, self::PSRAD)
            ->bind(OperationType::PSRAQ, self::PSRAQ)
            ->bind(OperationType::PSRAW, self::PSRAW)
            ->bind(OperationType::PSRLD, self::PSRLD)
            ->bind(OperationType::PSRLDQ, self::PSRLDQ)
            ->bind(OperationType::PSRLQ, self::PSRLQ)
            ->bind(OperationType::PSRLW, self::PSRLW)
            ->bind(OperationType::PSUBB, self::PSUBB)
            ->bind(OperationType::PSUBD, self::PSUBD)
            ->bind(OperationType::PSUBQ, self::PSUBQ)
            ->bind(OperationType::PSUBSB, self::PSUBSB)
            ->bind(OperationType::PSUBSW, self::PSUBSW)
            ->bind(OperationType::PSUBUSB, self::PSUBUSB)
            ->bind(OperationType::PSUBUSW, self::PSUBUSW)
            ->bind(OperationType::PSUBW, self::PSUBW)
            ->bind(OperationType::PTEST, self::PTEST)
            ->bind(OperationType::PTWRITE, self::PTWRITE)
            ->bind(OperationType::PUNPCKHBW, self::PUNPCKHBW)
            ->bind(OperationType::PUNPCKHDQ, self::PUNPCKHDQ)
            ->bind(OperationType::PUNPCKHQDQ, self::PUNPCKHQDQ)
            ->bind(OperationType::PUNPCKHWD, self::PUNPCKHWD)
            ->bind(OperationType::PUNPCKLBW, self::PUNPCKLBW)
            ->bind(OperationType::PUNPCKLDQ, self::PUNPCKLDQ)
            ->bind(OperationType::PUNPCKLQDQ, self::PUNPCKLQDQ)
            ->bind(OperationType::PUNPCKLWD, self::PUNPCKLWD)
            ->bind(OperationType::PUSH, self::PUSH)
            ->bind(OperationType::PUSHA, self::PUSHA)
            ->bind(OperationType::PUSHAD, self::PUSHAD)
            ->bind(OperationType::PUSHF, self::PUSHF)
            ->bind(OperationType::PUSHFD, self::PUSHFD)
            ->bind(OperationType::PUSHFQ, self::PUSHFQ)
            ->bind(OperationType::PXOR, self::PXOR)
            ->bind(OperationType::RCL, self::RCL)
            ->bind(OperationType::RCPPS, self::RCPPS)
            ->bind(OperationType::RCPSS, self::RCPSS)
            ->bind(OperationType::RCR, self::RCR)
            ->bind(OperationType::RDFSBASE, self::RDFSBASE)
            ->bind(OperationType::RDGSBASE, self::RDGSBASE)
            ->bind(OperationType::RDMSR, self::RDMSR)
            ->bind(OperationType::RDPID, self::RDPID)
            ->bind(OperationType::RDPKRU, self::RDPKRU)
            ->bind(OperationType::RDPMC, self::RDPMC)
            ->bind(OperationType::RDRAND, self::RDRAND)
            ->bind(OperationType::RDSEED, self::RDSEED)
            ->bind(OperationType::RDSSPD, self::RDSSPD)
            ->bind(OperationType::RDSSPQ, self::RDSSPQ)
            ->bind(OperationType::RDTSC, self::RDTSC)
            ->bind(OperationType::RDTSCP, self::RDTSCP)
            ->bind(OperationType::REP, self::REP)
            ->bind(OperationType::REPE, self::REPE)
            ->bind(OperationType::REPNE, self::REPNE)
            ->bind(OperationType::REPNZ, self::REPNZ)
            ->bind(OperationType::REPZ, self::REPZ)
            ->bind(OperationType::RET, self::RET)
            ->bind(OperationType::ROL, self::ROL)
            ->bind(OperationType::ROR, self::ROR)
            ->bind(OperationType::RORX, self::RORX)
            ->bind(OperationType::ROUNDPD, self::ROUNDPD)
            ->bind(OperationType::ROUNDPS, self::ROUNDPS)
            ->bind(OperationType::ROUNDSD, self::ROUNDSD)
            ->bind(OperationType::ROUNDSS, self::ROUNDSS)
            ->bind(OperationType::RSM, self::RSM)
            ->bind(OperationType::RSQRTPS, self::RSQRTPS)
            ->bind(OperationType::RSQRTSS, self::RSQRTSS)
            ->bind(OperationType::RSTORSSP, self::RSTORSSP)
            ->bind(OperationType::SAHF, self::SAHF)
            ->bind(OperationType::SAL, self::SAL)
            ->bind(OperationType::SAR, self::SAR)
            ->bind(OperationType::SARX, self::SARX)
            ->bind(OperationType::SAVEPREVSSP, self::SAVEPREVSSP)
            ->bind(OperationType::SBB, self::SBB)
            ->bind(OperationType::SCAS, self::SCAS)
            ->bind(OperationType::SCASB, self::SCASB)
            ->bind(OperationType::SCASD, self::SCASD)
            ->bind(OperationType::SCASW, self::SCASW)
            ->bind(OperationType::SENDUIPI, self::SENDUIPI)
            ->bind(OperationType::SERIALIZE, self::SERIALIZE)
            ->bind(OperationType::SETSSBSY, self::SETSSBSY)
            ->bind(OperationType::SETCC, self::SETCC)
            ->bind(OperationType::SFENCE, self::SFENCE)
            ->bind(OperationType::SGDT, self::SGDT)
            ->bind(OperationType::SHA1MSG1, self::SHA1MSG1)
            ->bind(OperationType::SHA1MSG2, self::SHA1MSG2)
            ->bind(OperationType::SHA1NEXTE, self::SHA1NEXTE)
            ->bind(OperationType::SHA1RNDS4, self::SHA1RNDS4)
            ->bind(OperationType::SHA256MSG1, self::SHA256MSG1)
            ->bind(OperationType::SHA256MSG2, self::SHA256MSG2)
            ->bind(OperationType::SHA256RNDS2, self::SHA256RNDS2)
            ->bind(OperationType::SHL, self::SHL)
            ->bind(OperationType::SHLD, self::SHLD)
            ->bind(OperationType::SHLX, self::SHLX)
            ->bind(OperationType::SHR, self::SHR)
            ->bind(OperationType::SHRD, self::SHRD)
            ->bind(OperationType::SHRX, self::SHRX)
            ->bind(OperationType::SHUFPD, self::SHUFPD)
            ->bind(OperationType::SHUFPS, self::SHUFPS)
            ->bind(OperationType::SIDT, self::SIDT)
            ->bind(OperationType::SLDT, self::SLDT)
            ->bind(OperationType::SMSW, self::SMSW)
            ->bind(OperationType::SQRTPD, self::SQRTPD)
            ->bind(OperationType::SQRTPS, self::SQRTPS)
            ->bind(OperationType::SQRTSD, self::SQRTSD)
            ->bind(OperationType::SQRTSS, self::SQRTSS)
            ->bind(OperationType::STAC, self::STAC)
            ->bind(OperationType::STC, self::STC)
            ->bind(OperationType::STD, self::STD)
            ->bind(OperationType::STI, self::STI)
            ->bind(OperationType::STMXCSR, self::STMXCSR)
            ->bind(OperationType::STOS, self::STOS)
            ->bind(OperationType::STOSB, self::STOSB)
            ->bind(OperationType::STOSD, self::STOSD)
            ->bind(OperationType::STOSQ, self::STOSQ)
            ->bind(OperationType::STOSW, self::STOSW)
            ->bind(OperationType::STR, self::STR)
            ->bind(OperationType::STTILECFG, self::STTILECFG)
            ->bind(OperationType::STUI, self::STUI)
            ->bind(OperationType::SUB, self::SUB)
            ->bind(OperationType::SUBPD, self::SUBPD)
            ->bind(OperationType::SUBPS, self::SUBPS)
            ->bind(OperationType::SUBSD, self::SUBSD)
            ->bind(OperationType::SUBSS, self::SUBSS)
            ->bind(OperationType::SWAPGS, self::SWAPGS)
            ->bind(OperationType::SYSCALL, self::SYSCALL)
            ->bind(OperationType::SYSENTER, self::SYSENTER)
            ->bind(OperationType::SYSEXIT, self::SYSEXIT)
            ->bind(OperationType::SYSRET, self::SYSRET)
            ->bind(OperationType::TDPBF16PS, self::TDPBF16PS)
            ->bind(OperationType::TDPBSSD, self::TDPBSSD)
            ->bind(OperationType::TDPBSUD, self::TDPBSUD)
            ->bind(OperationType::TDPBUSD, self::TDPBUSD)
            ->bind(OperationType::TDPBUUD, self::TDPBUUD)
            ->bind(OperationType::TEST, self::TEST)
            ->bind(OperationType::TESTUI, self::TESTUI)
            ->bind(OperationType::TILELOADD, self::TILELOADD)
            ->bind(OperationType::TILELOADDT1, self::TILELOADDT1)
            ->bind(OperationType::TILERELEASE, self::TILERELEASE)
            ->bind(OperationType::TILESTORED, self::TILESTORED)
            ->bind(OperationType::TILEZERO, self::TILEZERO)
            ->bind(OperationType::TPAUSE, self::TPAUSE)
            ->bind(OperationType::TZCNT, self::TZCNT)
            ->bind(OperationType::UCOMISD, self::UCOMISD)
            ->bind(OperationType::UCOMISS, self::UCOMISS)
            ->bind(OperationType::UD, self::UD)
            ->bind(OperationType::UIRET, self::UIRET)
            ->bind(OperationType::UMONITOR, self::UMONITOR)
            ->bind(OperationType::UMWAIT, self::UMWAIT)
            ->bind(OperationType::UNPCKHPD, self::UNPCKHPD)
            ->bind(OperationType::UNPCKHPS, self::UNPCKHPS)
            ->bind(OperationType::UNPCKLPD, self::UNPCKLPD)
            ->bind(OperationType::UNPCKLPS, self::UNPCKLPS)
            ->bind(OperationType::VADDPH, self::VADDPH)
            ->bind(OperationType::VADDSH, self::VADDSH)
            ->bind(OperationType::VALIGND, self::VALIGND)
            ->bind(OperationType::VALIGNQ, self::VALIGNQ)
            ->bind(OperationType::VBLENDMPD, self::VBLENDMPD)
            ->bind(OperationType::VBLENDMPS, self::VBLENDMPS)
            ->bind(OperationType::VBROADCAST, self::VBROADCAST)
            ->bind(OperationType::VCMPPH, self::VCMPPH)
            ->bind(OperationType::VCMPSH, self::VCMPSH)
            ->bind(OperationType::VCOMISH, self::VCOMISH)
            ->bind(OperationType::VCOMPRESSPD, self::VCOMPRESSPD)
            ->bind(OperationType::VCOMPRESSPS, self::VCOMPRESSPS)
            ->bind(OperationType::VCOMPRESSW, self::VCOMPRESSW)
            ->bind(OperationType::VCVTDQ2PH, self::VCVTDQ2PH)
            ->bind(OperationType::VCVTNE2PS2BF16, self::VCVTNE2PS2BF16)
            ->bind(OperationType::VCVTNEPS2BF16, self::VCVTNEPS2BF16)
            ->bind(OperationType::VCVTPD2PH, self::VCVTPD2PH)
            ->bind(OperationType::VCVTPD2QQ, self::VCVTPD2QQ)
            ->bind(OperationType::VCVTPD2UDQ, self::VCVTPD2UDQ)
            ->bind(OperationType::VCVTPD2UQQ, self::VCVTPD2UQQ)
            ->bind(OperationType::VCVTPH2DQ, self::VCVTPH2DQ)
            ->bind(OperationType::VCVTPH2PD, self::VCVTPH2PD)
            ->bind(OperationType::VCVTPH2PS, self::VCVTPH2PS)
            ->bind(OperationType::VCVTPH2PSX, self::VCVTPH2PSX)
            ->bind(OperationType::VCVTPH2QQ, self::VCVTPH2QQ)
            ->bind(OperationType::VCVTPH2UDQ, self::VCVTPH2UDQ)
            ->bind(OperationType::VCVTPH2UQQ, self::VCVTPH2UQQ)
            ->bind(OperationType::VCVTPH2UW, self::VCVTPH2UW)
            ->bind(OperationType::VCVTPH2W, self::VCVTPH2W)
            ->bind(OperationType::VCVTPS2PH, self::VCVTPS2PH)
            ->bind(OperationType::VCVTPS2PHX, self::VCVTPS2PHX)
            ->bind(OperationType::VCVTPS2QQ, self::VCVTPS2QQ)
            ->bind(OperationType::VCVTPS2UDQ, self::VCVTPS2UDQ)
            ->bind(OperationType::VCVTPS2UQQ, self::VCVTPS2UQQ)
            ->bind(OperationType::VCVTQQ2PD, self::VCVTQQ2PD)
            ->bind(OperationType::VCVTQQ2PH, self::VCVTQQ2PH)
            ->bind(OperationType::VCVTQQ2PS, self::VCVTQQ2PS)
            ->bind(OperationType::VCVTSD2SH, self::VCVTSD2SH)
            ->bind(OperationType::VCVTSD2USI, self::VCVTSD2USI)
            ->bind(OperationType::VCVTSH2SD, self::VCVTSH2SD)
            ->bind(OperationType::VCVTSH2SI, self::VCVTSH2SI)
            ->bind(OperationType::VCVTSH2SS, self::VCVTSH2SS)
            ->bind(OperationType::VCVTSH2USI, self::VCVTSH2USI)
            ->bind(OperationType::VCVTSI2SH, self::VCVTSI2SH)
            ->bind(OperationType::VCVTSS2SH, self::VCVTSS2SH)
            ->bind(OperationType::VCVTSS2USI, self::VCVTSS2USI)
            ->bind(OperationType::VCVTTPD2QQ, self::VCVTTPD2QQ)
            ->bind(OperationType::VCVTTPD2UDQ, self::VCVTTPD2UDQ)
            ->bind(OperationType::VCVTTPD2UQQ, self::VCVTTPD2UQQ)
            ->bind(OperationType::VCVTTPH2DQ, self::VCVTTPH2DQ)
            ->bind(OperationType::VCVTTPH2QQ, self::VCVTTPH2QQ)
            ->bind(OperationType::VCVTTPH2UDQ, self::VCVTTPH2UDQ)
            ->bind(OperationType::VCVTTPH2UQQ, self::VCVTTPH2UQQ)
            ->bind(OperationType::VCVTTPH2UW, self::VCVTTPH2UW)
            ->bind(OperationType::VCVTTPH2W, self::VCVTTPH2W)
            ->bind(OperationType::VCVTTPS2QQ, self::VCVTTPS2QQ)
            ->bind(OperationType::VCVTTPS2UDQ, self::VCVTTPS2UDQ)
            ->bind(OperationType::VCVTTPS2UQQ, self::VCVTTPS2UQQ)
            ->bind(OperationType::VCVTTSD2USI, self::VCVTTSD2USI)
            ->bind(OperationType::VCVTTSH2SI, self::VCVTTSH2SI)
            ->bind(OperationType::VCVTTSH2USI, self::VCVTTSH2USI)
            ->bind(OperationType::VCVTTSS2USI, self::VCVTTSS2USI)
            ->bind(OperationType::VCVTUDQ2PD, self::VCVTUDQ2PD)
            ->bind(OperationType::VCVTUDQ2PH, self::VCVTUDQ2PH)
            ->bind(OperationType::VCVTUDQ2PS, self::VCVTUDQ2PS)
            ->bind(OperationType::VCVTUQQ2PD, self::VCVTUQQ2PD)
            ->bind(OperationType::VCVTUQQ2PH, self::VCVTUQQ2PH)
            ->bind(OperationType::VCVTUQQ2PS, self::VCVTUQQ2PS)
            ->bind(OperationType::VCVTUSI2SD, self::VCVTUSI2SD)
            ->bind(OperationType::VCVTUSI2SH, self::VCVTUSI2SH)
            ->bind(OperationType::VCVTUSI2SS, self::VCVTUSI2SS)
            ->bind(OperationType::VCVTUW2PH, self::VCVTUW2PH)
            ->bind(OperationType::VCVTW2PH, self::VCVTW2PH)
            ->bind(OperationType::VDBPSADBW, self::VDBPSADBW)
            ->bind(OperationType::VDIVPH, self::VDIVPH)
            ->bind(OperationType::VDIVSH, self::VDIVSH)
            ->bind(OperationType::VDPBF16PS, self::VDPBF16PS)
            ->bind(OperationType::VERR, self::VERR)
            ->bind(OperationType::VERW, self::VERW)
            ->bind(OperationType::VEXPANDPD, self::VEXPANDPD)
            ->bind(OperationType::VEXPANDPS, self::VEXPANDPS)
            ->bind(OperationType::VEXTRACTF128, self::VEXTRACTF128)
            ->bind(OperationType::VEXTRACTF32X4, self::VEXTRACTF32X4)
            ->bind(OperationType::VEXTRACTF32X8, self::VEXTRACTF32X8)
            ->bind(OperationType::VEXTRACTF64X2, self::VEXTRACTF64X2)
            ->bind(OperationType::VEXTRACTF64X4, self::VEXTRACTF64X4)
            ->bind(OperationType::VEXTRACTI128, self::VEXTRACTI128)
            ->bind(OperationType::VEXTRACTI32X4, self::VEXTRACTI32X4)
            ->bind(OperationType::VEXTRACTI32X8, self::VEXTRACTI32X8)
            ->bind(OperationType::VEXTRACTI64X2, self::VEXTRACTI64X2)
            ->bind(OperationType::VEXTRACTI64X4, self::VEXTRACTI64X4)
            ->bind(OperationType::VFCMADDCPH, self::VFCMADDCPH)
            ->bind(OperationType::VFCMADDCSH, self::VFCMADDCSH)
            ->bind(OperationType::VFCMULCPH, self::VFCMULCPH)
            ->bind(OperationType::VFCMULCSH, self::VFCMULCSH)
            ->bind(OperationType::VFIXUPIMMPD, self::VFIXUPIMMPD)
            ->bind(OperationType::VFIXUPIMMPS, self::VFIXUPIMMPS)
            ->bind(OperationType::VFIXUPIMMSD, self::VFIXUPIMMSD)
            ->bind(OperationType::VFIXUPIMMSS, self::VFIXUPIMMSS)
            ->bind(OperationType::VFMADD132PD, self::VFMADD132PD)
            ->bind(OperationType::VFMADD132PH, self::VFMADD132PH)
            ->bind(OperationType::VFMADD132PS, self::VFMADD132PS)
            ->bind(OperationType::VFMADD132SD, self::VFMADD132SD)
            ->bind(OperationType::VFMADD132SH, self::VFMADD132SH)
            ->bind(OperationType::VFMADD132SS, self::VFMADD132SS)
            ->bind(OperationType::VFMADD213PD, self::VFMADD213PD)
            ->bind(OperationType::VFMADD213PH, self::VFMADD213PH)
            ->bind(OperationType::VFMADD213PS, self::VFMADD213PS)
            ->bind(OperationType::VFMADD213SD, self::VFMADD213SD)
            ->bind(OperationType::VFMADD213SH, self::VFMADD213SH)
            ->bind(OperationType::VFMADD213SS, self::VFMADD213SS)
            ->bind(OperationType::VFMADD231PD, self::VFMADD231PD)
            ->bind(OperationType::VFMADD231PH, self::VFMADD231PH)
            ->bind(OperationType::VFMADD231PS, self::VFMADD231PS)
            ->bind(OperationType::VFMADD231SD, self::VFMADD231SD)
            ->bind(OperationType::VFMADD231SH, self::VFMADD231SH)
            ->bind(OperationType::VFMADD231SS, self::VFMADD231SS)
            ->bind(OperationType::VFMADDCPH, self::VFMADDCPH)
            ->bind(OperationType::VFMADDCSH, self::VFMADDCSH)
            ->bind(OperationType::VFMADDRND231PD, self::VFMADDRND231PD)
            ->bind(OperationType::VFMADDSUB132PD, self::VFMADDSUB132PD)
            ->bind(OperationType::VFMADDSUB132PH, self::VFMADDSUB132PH)
            ->bind(OperationType::VFMADDSUB132PS, self::VFMADDSUB132PS)
            ->bind(OperationType::VFMADDSUB213PD, self::VFMADDSUB213PD)
            ->bind(OperationType::VFMADDSUB213PH, self::VFMADDSUB213PH)
            ->bind(OperationType::VFMADDSUB213PS, self::VFMADDSUB213PS)
            ->bind(OperationType::VFMADDSUB231PD, self::VFMADDSUB231PD)
            ->bind(OperationType::VFMADDSUB231PH, self::VFMADDSUB231PH)
            ->bind(OperationType::VFMADDSUB231PS, self::VFMADDSUB231PS)
            ->bind(OperationType::VFMSUB132PD, self::VFMSUB132PD)
            ->bind(OperationType::VFMSUB132PH, self::VFMSUB132PH)
            ->bind(OperationType::VFMSUB132PS, self::VFMSUB132PS)
            ->bind(OperationType::VFMSUB132SD, self::VFMSUB132SD)
            ->bind(OperationType::VFMSUB132SH, self::VFMSUB132SH)
            ->bind(OperationType::VFMSUB132SS, self::VFMSUB132SS)
            ->bind(OperationType::VFMSUB213PD, self::VFMSUB213PD)
            ->bind(OperationType::VFMSUB213PH, self::VFMSUB213PH)
            ->bind(OperationType::VFMSUB213PS, self::VFMSUB213PS)
            ->bind(OperationType::VFMSUB213SD, self::VFMSUB213SD)
            ->bind(OperationType::VFMSUB213SH, self::VFMSUB213SH)
            ->bind(OperationType::VFMSUB213SS, self::VFMSUB213SS)
            ->bind(OperationType::VFMSUB231PD, self::VFMSUB231PD)
            ->bind(OperationType::VFMSUB231PH, self::VFMSUB231PH)
            ->bind(OperationType::VFMSUB231PS, self::VFMSUB231PS)
            ->bind(OperationType::VFMSUB231SD, self::VFMSUB231SD)
            ->bind(OperationType::VFMSUB231SH, self::VFMSUB231SH)
            ->bind(OperationType::VFMSUB231SS, self::VFMSUB231SS)
            ->bind(OperationType::VFMSUBADD132PD, self::VFMSUBADD132PD)
            ->bind(OperationType::VFMSUBADD132PH, self::VFMSUBADD132PH)
            ->bind(OperationType::VFMSUBADD132PS, self::VFMSUBADD132PS)
            ->bind(OperationType::VFMSUBADD213PD, self::VFMSUBADD213PD)
            ->bind(OperationType::VFMSUBADD213PH, self::VFMSUBADD213PH)
            ->bind(OperationType::VFMSUBADD213PS, self::VFMSUBADD213PS)
            ->bind(OperationType::VFMSUBADD231PD, self::VFMSUBADD231PD)
            ->bind(OperationType::VFMSUBADD231PH, self::VFMSUBADD231PH)
            ->bind(OperationType::VFMSUBADD231PS, self::VFMSUBADD231PS)
            ->bind(OperationType::VFMULCPH, self::VFMULCPH)
            ->bind(OperationType::VFMULCSH, self::VFMULCSH)
            ->bind(OperationType::VFNMADD132PD, self::VFNMADD132PD)
            ->bind(OperationType::VFNMADD132PH, self::VFNMADD132PH)
            ->bind(OperationType::VFNMADD132PS, self::VFNMADD132PS)
            ->bind(OperationType::VFNMADD132SD, self::VFNMADD132SD)
            ->bind(OperationType::VFNMADD132SH, self::VFNMADD132SH)
            ->bind(OperationType::VFNMADD132SS, self::VFNMADD132SS)
            ->bind(OperationType::VFNMADD213PD, self::VFNMADD213PD)
            ->bind(OperationType::VFNMADD213PH, self::VFNMADD213PH)
            ->bind(OperationType::VFNMADD213PS, self::VFNMADD213PS)
            ->bind(OperationType::VFNMADD213SD, self::VFNMADD213SD)
            ->bind(OperationType::VFNMADD213SH, self::VFNMADD213SH)
            ->bind(OperationType::VFNMADD213SS, self::VFNMADD213SS)
            ->bind(OperationType::VFNMADD231PD, self::VFNMADD231PD)
            ->bind(OperationType::VFNMADD231PH, self::VFNMADD231PH)
            ->bind(OperationType::VFNMADD231PS, self::VFNMADD231PS)
            ->bind(OperationType::VFNMADD231SD, self::VFNMADD231SD)
            ->bind(OperationType::VFNMADD231SH, self::VFNMADD231SH)
            ->bind(OperationType::VFNMADD231SS, self::VFNMADD231SS)
            ->bind(OperationType::VFNMSUB132PD, self::VFNMSUB132PD)
            ->bind(OperationType::VFNMSUB132PH, self::VFNMSUB132PH)
            ->bind(OperationType::VFNMSUB132PS, self::VFNMSUB132PS)
            ->bind(OperationType::VFNMSUB132SD, self::VFNMSUB132SD)
            ->bind(OperationType::VFNMSUB132SH, self::VFNMSUB132SH)
            ->bind(OperationType::VFNMSUB132SS, self::VFNMSUB132SS)
            ->bind(OperationType::VFNMSUB213PD, self::VFNMSUB213PD)
            ->bind(OperationType::VFNMSUB213PH, self::VFNMSUB213PH)
            ->bind(OperationType::VFNMSUB213PS, self::VFNMSUB213PS)
            ->bind(OperationType::VFNMSUB213SD, self::VFNMSUB213SD)
            ->bind(OperationType::VFNMSUB213SH, self::VFNMSUB213SH)
            ->bind(OperationType::VFNMSUB213SS, self::VFNMSUB213SS)
            ->bind(OperationType::VFNMSUB231PD, self::VFNMSUB231PD)
            ->bind(OperationType::VFNMSUB231PH, self::VFNMSUB231PH)
            ->bind(OperationType::VFNMSUB231PS, self::VFNMSUB231PS)
            ->bind(OperationType::VFNMSUB231SD, self::VFNMSUB231SD)
            ->bind(OperationType::VFNMSUB231SH, self::VFNMSUB231SH)
            ->bind(OperationType::VFNMSUB231SS, self::VFNMSUB231SS)
            ->bind(OperationType::VFPCLASSPD, self::VFPCLASSPD)
            ->bind(OperationType::VFPCLASSPH, self::VFPCLASSPH)
            ->bind(OperationType::VFPCLASSPS, self::VFPCLASSPS)
            ->bind(OperationType::VFPCLASSSD, self::VFPCLASSSD)
            ->bind(OperationType::VFPCLASSSH, self::VFPCLASSSH)
            ->bind(OperationType::VFPCLASSSS, self::VFPCLASSSS)
            ->bind(OperationType::VGATHERDPD, self::VGATHERDPD)
            ->bind(OperationType::VGATHERDPS, self::VGATHERDPS)
            ->bind(OperationType::VGATHERQPD, self::VGATHERQPD)
            ->bind(OperationType::VGATHERQPS, self::VGATHERQPS)
            ->bind(OperationType::VGETEXPPD, self::VGETEXPPD)
            ->bind(OperationType::VGETEXPPH, self::VGETEXPPH)
            ->bind(OperationType::VGETEXPPS, self::VGETEXPPS)
            ->bind(OperationType::VGETEXPSD, self::VGETEXPSD)
            ->bind(OperationType::VGETEXPSH, self::VGETEXPSH)
            ->bind(OperationType::VGETEXPSS, self::VGETEXPSS)
            ->bind(OperationType::VGETMANTPD, self::VGETMANTPD)
            ->bind(OperationType::VGETMANTPH, self::VGETMANTPH)
            ->bind(OperationType::VGETMANTPS, self::VGETMANTPS)
            ->bind(OperationType::VGETMANTSD, self::VGETMANTSD)
            ->bind(OperationType::VGETMANTSH, self::VGETMANTSH)
            ->bind(OperationType::VGETMANTSS, self::VGETMANTSS)
            ->bind(OperationType::VINSERTF128, self::VINSERTF128)
            ->bind(OperationType::VINSERTF32X4, self::VINSERTF32X4)
            ->bind(OperationType::VINSERTF32X8, self::VINSERTF32X8)
            ->bind(OperationType::VINSERTF64X2, self::VINSERTF64X2)
            ->bind(OperationType::VINSERTF64X4, self::VINSERTF64X4)
            ->bind(OperationType::VINSERTI128, self::VINSERTI128)
            ->bind(OperationType::VINSERTI32X4, self::VINSERTI32X4)
            ->bind(OperationType::VINSERTI32X8, self::VINSERTI32X8)
            ->bind(OperationType::VINSERTI64X2, self::VINSERTI64X2)
            ->bind(OperationType::VINSERTI64X4, self::VINSERTI64X4)
            ->bind(OperationType::VMASKMOV, self::VMASKMOV)
            ->bind(OperationType::VMAXPH, self::VMAXPH)
            ->bind(OperationType::VMAXSH, self::VMAXSH)
            ->bind(OperationType::VMINPH, self::VMINPH)
            ->bind(OperationType::VMINSH, self::VMINSH)
            ->bind(OperationType::VMOVDQA32, self::VMOVDQA32)
            ->bind(OperationType::VMOVDQA64, self::VMOVDQA64)
            ->bind(OperationType::VMOVDQU16, self::VMOVDQU16)
            ->bind(OperationType::VMOVDQU32, self::VMOVDQU32)
            ->bind(OperationType::VMOVDQU64, self::VMOVDQU64)
            ->bind(OperationType::VMOVDQU8, self::VMOVDQU8)
            ->bind(OperationType::VMOVSH, self::VMOVSH)
            ->bind(OperationType::VMOVW, self::VMOVW)
            ->bind(OperationType::VMULPH, self::VMULPH)
            ->bind(OperationType::VMULSH, self::VMULSH)
            ->bind(OperationType::VP2INTERSECTD, self::VP2INTERSECTD)
            ->bind(OperationType::VP2INTERSECTQ, self::VP2INTERSECTQ)
            ->bind(OperationType::VPBLENDD, self::VPBLENDD)
            ->bind(OperationType::VPBLENDMB, self::VPBLENDMB)
            ->bind(OperationType::VPBLENDMD, self::VPBLENDMD)
            ->bind(OperationType::VPBLENDMQ, self::VPBLENDMQ)
            ->bind(OperationType::VPBLENDMW, self::VPBLENDMW)
            ->bind(OperationType::VPBROADCAST, self::VPBROADCAST)
            ->bind(OperationType::VPBROADCASTB, self::VPBROADCASTB)
            ->bind(OperationType::VPBROADCASTD, self::VPBROADCASTD)
            ->bind(OperationType::VPBROADCASTM, self::VPBROADCASTM)
            ->bind(OperationType::VPBROADCASTQ, self::VPBROADCASTQ)
            ->bind(OperationType::VPBROADCASTW, self::VPBROADCASTW)
            ->bind(OperationType::VPCMPB, self::VPCMPB)
            ->bind(OperationType::VPCMPD, self::VPCMPD)
            ->bind(OperationType::VPCMPQ, self::VPCMPQ)
            ->bind(OperationType::VPCMPUB, self::VPCMPUB)
            ->bind(OperationType::VPCMPUD, self::VPCMPUD)
            ->bind(OperationType::VPCMPUQ, self::VPCMPUQ)
            ->bind(OperationType::VPCMPUW, self::VPCMPUW)
            ->bind(OperationType::VPCMPW, self::VPCMPW)
            ->bind(OperationType::VPCOMPRESSB, self::VPCOMPRESSB)
            ->bind(OperationType::VPCOMPRESSD, self::VPCOMPRESSD)
            ->bind(OperationType::VPCOMPRESSQ, self::VPCOMPRESSQ)
            ->bind(OperationType::VPCONFLICTD, self::VPCONFLICTD)
            ->bind(OperationType::VPCONFLICTQ, self::VPCONFLICTQ)
            ->bind(OperationType::VPDPBUSD, self::VPDPBUSD)
            ->bind(OperationType::VPDPBUSDS, self::VPDPBUSDS)
            ->bind(OperationType::VPDPWSSD, self::VPDPWSSD)
            ->bind(OperationType::VPDPWSSDS, self::VPDPWSSDS)
            ->bind(OperationType::VPERM2F128, self::VPERM2F128)
            ->bind(OperationType::VPERM2I128, self::VPERM2I128)
            ->bind(OperationType::VPERMB, self::VPERMB)
            ->bind(OperationType::VPERMD, self::VPERMD)
            ->bind(OperationType::VPERMI2B, self::VPERMI2B)
            ->bind(OperationType::VPERMI2D, self::VPERMI2D)
            ->bind(OperationType::VPERMI2PD, self::VPERMI2PD)
            ->bind(OperationType::VPERMI2PS, self::VPERMI2PS)
            ->bind(OperationType::VPERMI2Q, self::VPERMI2Q)
            ->bind(OperationType::VPERMI2W, self::VPERMI2W)
            ->bind(OperationType::VPERMILPD, self::VPERMILPD)
            ->bind(OperationType::VPERMILPS, self::VPERMILPS)
            ->bind(OperationType::VPERMPD, self::VPERMPD)
            ->bind(OperationType::VPERMPS, self::VPERMPS)
            ->bind(OperationType::VPERMQ, self::VPERMQ)
            ->bind(OperationType::VPERMT2B, self::VPERMT2B)
            ->bind(OperationType::VPERMT2D, self::VPERMT2D)
            ->bind(OperationType::VPERMT2PD, self::VPERMT2PD)
            ->bind(OperationType::VPERMT2PS, self::VPERMT2PS)
            ->bind(OperationType::VPERMT2Q, self::VPERMT2Q)
            ->bind(OperationType::VPERMT2W, self::VPERMT2W)
            ->bind(OperationType::VPERMW, self::VPERMW)
            ->bind(OperationType::VPEXPANDB, self::VPEXPANDB)
            ->bind(OperationType::VPEXPANDD, self::VPEXPANDD)
            ->bind(OperationType::VPEXPANDQ, self::VPEXPANDQ)
            ->bind(OperationType::VPEXPANDW, self::VPEXPANDW)
            ->bind(OperationType::VPGATHERDD, self::VPGATHERDD)
            ->bind(OperationType::VPGATHERDQ, self::VPGATHERDQ)
            ->bind(OperationType::VPGATHERQD, self::VPGATHERQD)
            ->bind(OperationType::VPGATHERQQ, self::VPGATHERQQ)
            ->bind(OperationType::VPLZCNTD, self::VPLZCNTD)
            ->bind(OperationType::VPLZCNTQ, self::VPLZCNTQ)
            ->bind(OperationType::VPMADD52HUQ, self::VPMADD52HUQ)
            ->bind(OperationType::VPMADD52LUQ, self::VPMADD52LUQ)
            ->bind(OperationType::VPMASKMOV, self::VPMASKMOV)
            ->bind(OperationType::VPMOVB2M, self::VPMOVB2M)
            ->bind(OperationType::VPMOVD2M, self::VPMOVD2M)
            ->bind(OperationType::VPMOVDB, self::VPMOVDB)
            ->bind(OperationType::VPMOVDW, self::VPMOVDW)
            ->bind(OperationType::VPMOVM2B, self::VPMOVM2B)
            ->bind(OperationType::VPMOVM2D, self::VPMOVM2D)
            ->bind(OperationType::VPMOVM2Q, self::VPMOVM2Q)
            ->bind(OperationType::VPMOVM2W, self::VPMOVM2W)
            ->bind(OperationType::VPMOVQ2M, self::VPMOVQ2M)
            ->bind(OperationType::VPMOVQB, self::VPMOVQB)
            ->bind(OperationType::VPMOVQD, self::VPMOVQD)
            ->bind(OperationType::VPMOVQW, self::VPMOVQW)
            ->bind(OperationType::VPMOVSDB, self::VPMOVSDB)
            ->bind(OperationType::VPMOVSDW, self::VPMOVSDW)
            ->bind(OperationType::VPMOVSQB, self::VPMOVSQB)
            ->bind(OperationType::VPMOVSQD, self::VPMOVSQD)
            ->bind(OperationType::VPMOVSQW, self::VPMOVSQW)
            ->bind(OperationType::VPMOVSWB, self::VPMOVSWB)
            ->bind(OperationType::VPMOVUSDB, self::VPMOVUSDB)
            ->bind(OperationType::VPMOVUSDW, self::VPMOVUSDW)
            ->bind(OperationType::VPMOVUSQB, self::VPMOVUSQB)
            ->bind(OperationType::VPMOVUSQD, self::VPMOVUSQD)
            ->bind(OperationType::VPMOVUSQW, self::VPMOVUSQW)
            ->bind(OperationType::VPMOVUSWB, self::VPMOVUSWB)
            ->bind(OperationType::VPMOVW2M, self::VPMOVW2M)
            ->bind(OperationType::VPMOVWB, self::VPMOVWB)
            ->bind(OperationType::VPMULTISHIFTQB, self::VPMULTISHIFTQB)
            ->bind(OperationType::VPOPCNT, self::VPOPCNT)
            ->bind(OperationType::VPROLD, self::VPROLD)
            ->bind(OperationType::VPROLQ, self::VPROLQ)
            ->bind(OperationType::VPROLVD, self::VPROLVD)
            ->bind(OperationType::VPROLVQ, self::VPROLVQ)
            ->bind(OperationType::VPRORD, self::VPRORD)
            ->bind(OperationType::VPRORQ, self::VPRORQ)
            ->bind(OperationType::VPRORVD, self::VPRORVD)
            ->bind(OperationType::VPRORVQ, self::VPRORVQ)
            ->bind(OperationType::VPSCATTERDD, self::VPSCATTERDD)
            ->bind(OperationType::VPSCATTERDQ, self::VPSCATTERDQ)
            ->bind(OperationType::VPSCATTERQD, self::VPSCATTERQD)
            ->bind(OperationType::VPSCATTERQQ, self::VPSCATTERQQ)
            ->bind(OperationType::VPSHLD, self::VPSHLD)
            ->bind(OperationType::VPSHLDV, self::VPSHLDV)
            ->bind(OperationType::VPSHRD, self::VPSHRD)
            ->bind(OperationType::VPSHRDV, self::VPSHRDV)
            ->bind(OperationType::VPSHUFBITQMB, self::VPSHUFBITQMB)
            ->bind(OperationType::VPSLLVD, self::VPSLLVD)
            ->bind(OperationType::VPSLLVQ, self::VPSLLVQ)
            ->bind(OperationType::VPSLLVW, self::VPSLLVW)
            ->bind(OperationType::VPSRAVD, self::VPSRAVD)
            ->bind(OperationType::VPSRAVQ, self::VPSRAVQ)
            ->bind(OperationType::VPSRAVW, self::VPSRAVW)
            ->bind(OperationType::VPSRLVD, self::VPSRLVD)
            ->bind(OperationType::VPSRLVQ, self::VPSRLVQ)
            ->bind(OperationType::VPSRLVW, self::VPSRLVW)
            ->bind(OperationType::VPTERNLOGD, self::VPTERNLOGD)
            ->bind(OperationType::VPTERNLOGQ, self::VPTERNLOGQ)
            ->bind(OperationType::VPTESTMB, self::VPTESTMB)
            ->bind(OperationType::VPTESTMD, self::VPTESTMD)
            ->bind(OperationType::VPTESTMQ, self::VPTESTMQ)
            ->bind(OperationType::VPTESTMW, self::VPTESTMW)
            ->bind(OperationType::VPTESTNMB, self::VPTESTNMB)
            ->bind(OperationType::VPTESTNMD, self::VPTESTNMD)
            ->bind(OperationType::VPTESTNMQ, self::VPTESTNMQ)
            ->bind(OperationType::VPTESTNMW, self::VPTESTNMW)
            ->bind(OperationType::VRANGEPD, self::VRANGEPD)
            ->bind(OperationType::VRANGEPS, self::VRANGEPS)
            ->bind(OperationType::VRANGESD, self::VRANGESD)
            ->bind(OperationType::VRANGESS, self::VRANGESS)
            ->bind(OperationType::VRCP14PD, self::VRCP14PD)
            ->bind(OperationType::VRCP14PS, self::VRCP14PS)
            ->bind(OperationType::VRCP14SD, self::VRCP14SD)
            ->bind(OperationType::VRCP14SS, self::VRCP14SS)
            ->bind(OperationType::VRCPPH, self::VRCPPH)
            ->bind(OperationType::VRCPSH, self::VRCPSH)
            ->bind(OperationType::VREDUCEPD, self::VREDUCEPD)
            ->bind(OperationType::VREDUCEPH, self::VREDUCEPH)
            ->bind(OperationType::VREDUCEPS, self::VREDUCEPS)
            ->bind(OperationType::VREDUCESD, self::VREDUCESD)
            ->bind(OperationType::VREDUCESH, self::VREDUCESH)
            ->bind(OperationType::VREDUCESS, self::VREDUCESS)
            ->bind(OperationType::VRNDSCALEPD, self::VRNDSCALEPD)
            ->bind(OperationType::VRNDSCALEPH, self::VRNDSCALEPH)
            ->bind(OperationType::VRNDSCALEPS, self::VRNDSCALEPS)
            ->bind(OperationType::VRNDSCALESD, self::VRNDSCALESD)
            ->bind(OperationType::VRNDSCALESH, self::VRNDSCALESH)
            ->bind(OperationType::VRNDSCALESS, self::VRNDSCALESS)
            ->bind(OperationType::VRSQRT14PD, self::VRSQRT14PD)
            ->bind(OperationType::VRSQRT14PS, self::VRSQRT14PS)
            ->bind(OperationType::VRSQRT14SD, self::VRSQRT14SD)
            ->bind(OperationType::VRSQRT14SS, self::VRSQRT14SS)
            ->bind(OperationType::VRSQRTPH, self::VRSQRTPH)
            ->bind(OperationType::VRSQRTSH, self::VRSQRTSH)
            ->bind(OperationType::VSCALEFPD, self::VSCALEFPD)
            ->bind(OperationType::VSCALEFPH, self::VSCALEFPH)
            ->bind(OperationType::VSCALEFPS, self::VSCALEFPS)
            ->bind(OperationType::VSCALEFSD, self::VSCALEFSD)
            ->bind(OperationType::VSCALEFSH, self::VSCALEFSH)
            ->bind(OperationType::VSCALEFSS, self::VSCALEFSS)
            ->bind(OperationType::VSCATTERDPD, self::VSCATTERDPD)
            ->bind(OperationType::VSCATTERDPS, self::VSCATTERDPS)
            ->bind(OperationType::VSCATTERQPD, self::VSCATTERQPD)
            ->bind(OperationType::VSCATTERQPS, self::VSCATTERQPS)
            ->bind(OperationType::VSHUFF32X4, self::VSHUFF32X4)
            ->bind(OperationType::VSHUFF64X2, self::VSHUFF64X2)
            ->bind(OperationType::VSHUFI32X4, self::VSHUFI32X4)
            ->bind(OperationType::VSHUFI64X2, self::VSHUFI64X2)
            ->bind(OperationType::VSQRTPH, self::VSQRTPH)
            ->bind(OperationType::VSQRTSH, self::VSQRTSH)
            ->bind(OperationType::VSUBPH, self::VSUBPH)
            ->bind(OperationType::VSUBSH, self::VSUBSH)
            ->bind(OperationType::VTESTPD, self::VTESTPD)
            ->bind(OperationType::VTESTPS, self::VTESTPS)
            ->bind(OperationType::VUCOMISH, self::VUCOMISH)
            ->bind(OperationType::VZEROALL, self::VZEROALL)
            ->bind(OperationType::VZEROUPPER, self::VZEROUPPER)
            ->bind(OperationType::WAIT, self::WAIT)
            ->bind(OperationType::WBINVD, self::WBINVD)
            ->bind(OperationType::WBNOINVD, self::WBNOINVD)
            ->bind(OperationType::WRFSBASE, self::WRFSBASE)
            ->bind(OperationType::WRGSBASE, self::WRGSBASE)
            ->bind(OperationType::WRMSR, self::WRMSR)
            ->bind(OperationType::WRPKRU, self::WRPKRU)
            ->bind(OperationType::WRSSD, self::WRSSD)
            ->bind(OperationType::WRSSQ, self::WRSSQ)
            ->bind(OperationType::WRUSSD, self::WRUSSD)
            ->bind(OperationType::WRUSSQ, self::WRUSSQ)
            ->bind(OperationType::XABORT, self::XABORT)
            ->bind(OperationType::XACQUIRE, self::XACQUIRE)
            ->bind(OperationType::XADD, self::XADD)
            ->bind(OperationType::XBEGIN, self::XBEGIN)
            ->bind(OperationType::XCHG, self::XCHG)
            ->bind(OperationType::XEND, self::XEND)
            ->bind(OperationType::XGETBV, self::XGETBV)
            ->bind(OperationType::XLAT, self::XLAT)
            ->bind(OperationType::XLATB, self::XLATB)
            ->bind(OperationType::XOR_, self::XOR_)
            ->bind(OperationType::XORPD, self::XORPD)
            ->bind(OperationType::XORPS, self::XORPS)
            ->bind(OperationType::XRELEASE, self::XRELEASE)
            ->bind(OperationType::XRESLDTRK, self::XRESLDTRK)
            ->bind(OperationType::XRSTOR, self::XRSTOR)
            ->bind(OperationType::XRSTORS, self::XRSTORS)
            ->bind(OperationType::XSAVE, self::XSAVE)
            ->bind(OperationType::XSAVEC, self::XSAVEC)
            ->bind(OperationType::XSAVEOPT, self::XSAVEOPT)
            ->bind(OperationType::XSAVES, self::XSAVES)
            ->bind(OperationType::XSETBV, self::XSETBV)
            ->bind(OperationType::XSUSLDTRK, self::XSUSLDTRK)
            ->bind(OperationType::XTEST, self::XTEST);
    }
}
